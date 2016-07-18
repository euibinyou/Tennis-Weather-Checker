<?php

namespace Drupal\tennis_weather\Controller;

use Drupal\Core\Url;
use Drupal\Core\Database\Database;
use Drupal\Component\Utility\SafeMarkup;

/**
 * Controller routines for tennis_weather pages.
 */
class TennisWeatherController {

  /**
   * Display weather for given zip.
   * This callback is mapped to the path
   * 'tennis_weather/{zip}'.
   *
   * @param string $zip
   *   ZIP code of the area to check weather
   */
  public function content($zip) {
    $page_title = 'Tennis Weather Checker';

    // Theme function
    $element['#theme'] = 'tennis_weather';

    $element['#title'] = SafeMarkup::checkPlain($page_title);

    // API keys
    $weatherAPIkey = 'bb27100d1b9656be';
    $mapsAPIkey =  'AIzaSyDha2hYwC74_fsOQIWWEZ0Qzd8UAmJtHlA';
    // Weather Underground API (current condition and forecast)
    $weatherAPIurl = 'http://api.wunderground.com/api/' . $weatherAPIkey . '/geolookup/conditions/hourly/q/' .  $zip . '.json';

    // get weather data JSON from Weather Underground
    $client = \Drupal::httpClient();
    try {
      $request = $client->get($weatherAPIurl);
      $response = $request->getBody();
    }
    catch (RequestException $e) {
      // TODO: better error handling?
      watchdog_exception('weather API', $e->getMessage());
    }
    $parsed_json = json_decode($response);

    // var_dump($parsed_json);
    // var_dump($weatherAPIurl);

    // Error handling if nothing returned from Weather Underground API
    if ($parsed_json === NULL) {
      drupal_set_message('Error: nothing returned from Weather Underground API (probably an internet connectivity problem)', 'error');
      $element['#debug_info']['error'] = True;
      return $element;
    }

    // Error handling for Weather Underground API response
    if (property_exists($parsed_json->{'response'}, 'error')) {
      drupal_set_message('Weather Underground API says: ' . $parsed_json->{'response'}->{'error'}->{'description'}, 'error');
      $element['#debug_info']['error'] = True;
      return $element;
    }

    $timezone = $parsed_json->{'current_observation'}->{'local_tz_long'};
    // Weather Underground API (radar - satellite)
    $radarURL = "http://api.wunderground.com/api/$weatherAPIkey/animatedsatellite/q/$zip.gif?width=640&height=480&key=sat_ir4_bottom&timelabel=1&timelabel.x=470&timelabel.y=20&proj=me&num=8&delay=50&tzname=$timezone&basemap=0&radius=260&radunits=km&borders=0";
    // Google Static Maps API (base layer / map for radar)
    $mapURL = "https://maps.googleapis.com/maps/api/staticmap?center=$zip&zoom=7&size=640x480&maptype=roadmap&key=$mapsAPIkey";

    $element['#radar_gif'] = $radarURL;
    $element['#map_img'] = $mapURL;


    // City, ST (ZIP)
    $element['#subheading'] = SafeMarkup::checkPlain($parsed_json->{'location'}->{'city'}
                                                      . ', ' . $parsed_json->{'location'}->{'state'}
                                                      . ' (' . $parsed_json->{'location'}->{'zip'} . ')');

    $element['#summary'] = $this->generateSummary($parsed_json->current_observation);

    $element['#current_icon'] = SafeMarkup::checkPlain('http://icons.wxug.com/i/c/j/' . $parsed_json->{'current_observation'}->{'icon'} . '.gif');
    $element['#current_cond']['text'] = SafeMarkup::checkPlain($parsed_json->{'current_observation'}->{'weather'});
    $element['#current_cond']['temp'] = SafeMarkup::checkPlain($parsed_json->{'current_observation'}->{'temp_f'});
    $element['#current_cond']['precip'] = SafeMarkup::checkPlain($parsed_json->{'current_observation'}->{'wind_mph'});

    $current_time = $parsed_json->{'hourly_forecast'}[0]->{'FCTTIME'}->{'hour'};
    $element['#forecast'] = $this->getForecast($parsed_json, $current_time);

    date_default_timezone_set($parsed_json->{'current_observation'}->{'local_tz_long'});
    $element['#timestamp'] = 'Updated: ' . date('l, g:i A', $parsed_json->{'current_observation'}->{'local_epoch'});

    // connect to weather database (MySQL)
    $connection = Database::getConnection('default', 'weather');

    $connectionOptions = $connection->getConnectionOptions();
    $element['#database_test'][] = SafeMarkup::checkPlain('Database: ' . $connectionOptions['database']);
    $element['#database_test'][] = SafeMarkup::checkPlain('Key: ' . $connection->getKey());
    $element['#database_test'][] = SafeMarkup::checkPlain('Target: ' . $connection->getTarget());

    $result = $connection->query("SELECT * FROM test");
    if (!$result) {
      $element['#database_test'][] = SafeMarkup::checkPlain('query didn\'t reaturn anything!');
    }
    while ($row = $result->fetchAssoc()) {
      $rowString = 'row: ';
      foreach ($row as $key => $val) {
        $rowString .= $key . '=' . $val . ' | ';
      }
      $rowString = chop($rowString, ' | ');
      $element['#database_test'][] = SafeMarkup::checkPlain($rowString);
    }

    $element['#debug_info'][] = "test";

    return $element;
  }

  /**
   * Returns the number of future hours of forecast to show.
   * @param string $json
   *   JSON response from Weather Underground API
   * @param string $current_time
   *   Current time in 24-hour format (e.g. '16' for 4 PM)
   * @return array $forecast
   *   Array of hourly forecast information (one element for each hour)
   */
  public function getForecast($json, $current_time) {
    list($future_count, $offset) = $this->calculateForecastHours($current_time);
    $forecast = array();
    $count = 0;

    // Get forecast data for only the hours we want
    for ($i = 0; $i < count($json->{'hourly_forecast'}); $i++) {
      // Skip the first $offset number of hourly forecasts in JSON to get to the hours we want
      if ($offset) {
        $offset--;
        continue;
      }
      $forecast[] = $json->{'hourly_forecast'}[$i];
      $count++;

      // Return once we have all the hourly forecast we want
      if ($count == $future_count) {
        return $forecast;
      }
    }
  }

  /**
   * Calculate range of hours to forecast given current time.
   * @param string $current_time
   *   Current time in 24-hour format (e.g. '16' for 4 PM)
   * @return array ($future_count, $offset)
   *   Number of future hours to forecast
   *   and offset to skip to the beginning of the range of future hours to forecast in Weather Underground API JSON response.
   */
  public function calculateForecastHours($current_time) {
    // Load settings
    $config = \Drupal::config('tennis_weather.settings');
    $start_time = $config->get('tennis_weather.start_hr');
    $start_ampm = $config->get('tennis_weather.start_ampm');
    $end_time = $config->get('tennis_weather.end_hr');
    $end_ampm = $config->get('tennis_weather.end_ampm');

    // Convert 12-hr to 24-hr format
    if ($start_ampm == 'PM') {
      $start_time += 12;
    }
    if ($end_ampm == 'PM')  {
      $end_time += 12;
    }

    $current_time = (int) $current_time;

    $offset = 0;
    if ($current_time >= $start_time && $current_time <= $end_time) {
      // If between start and end times, return number of hours to forecast for {current time} to end time (same day).
      $future_count = $end_time - $current_time + 1;
      return array($future_count, $offset);
    }
    elseif ($current_time >= $end_time) {
      // If at or past end time, return forecast for start to end time of next day
      // $offset = number of hours in Weather Underground API JSON response to skip to get to forecast for start time of next day
      $offset =  ($start_time + 23) - $current_time;
    }
    elseif ($current_time < $start_time) {
      // If earlier than start time, return number of hours to forecast for start time to end time (same day)
      $offset =  $start_time - $current_time;
    }

    $future_count = $end_time - $start_time + 1;
    return array($future_count, $offset);
  }

  /**
   * Generate concise text summary.
   * For now, just show precipitation amounts today and in the last hour.
   * @param assoc $json
   *
   * @return string $summary
   *
   */
  public function generateSummary($currentData) {
    $precip_today = ($currentData->precip_today_in == -9999 || $currentData->precip_today_in == -999) ? '0.00' : $currentData->precip_today_in;;
    $precip_1hr = ($currentData->precip_1hr_in == -9999 || $currentData->precip_1hr_in == -999) ? '0.00' : $currentData->precip_1hr_in;;

    $summary = array('today' => ['string' => "precipitation today: %s in.",
                                      'value' => $precip_today],
                     'hr' => ['string' => "precipitation in the last hour: %s in.",
                                    'value' => $precip_1hr]);

    return $summary;
  }
}
