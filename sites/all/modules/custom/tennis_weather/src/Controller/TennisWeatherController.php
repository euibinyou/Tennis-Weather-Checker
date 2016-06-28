<?php

namespace Drupal\tennis_weather\Controller;

use Drupal\Core\Url;
use Drupal\Core\Database\Database;
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Core\Database\Driver\mysql;

/**
 * Controller routines for tennis_weather pages.
 */
class TennisWeatherController {

  /**
   * Display weather for given zip.
   * This callback is mapped to the path
   * 'loremipsum/{zip}'.
   *
   * @param string $zip
   *   ZIP code of the area to check weather
   */
  public function content($zip) {
      $element['#theme'] = 'tennis_weather';

      $page_title = 'Tennis Weather Checker';
      $element['#title'] = SafeMarkup::checkPlain($page_title);

      // Weather Underground API
      $json_string = file_get_contents('http://api.wunderground.com/api/bb27100d1b9656be/geolookup/conditions/hourly/q/' . $zip . '.json');
      $parsed_json = json_decode($json_string);
      $element['#subheading'] = SafeMarkup::checkPlain($parsed_json->{'location'}->{'city'}
                                                        . ', ' . $parsed_json->{'location'}->{'state'}
                                                        . ' (' . $parsed_json->{'location'}->{'zip'} . ')');

      $element['#summary'] = SafeMarkup::checkPlain('[WEATHER SUMMARY]');
      $element['#current_icon'] = SafeMarkup::checkPlain('http://icons.wxug.com/i/c/j/' . $parsed_json->{'current_observation'}->{'icon'} . '.gif');
      $element['#current_cond']['text'] = SafeMarkup::checkPlain($parsed_json->{'current_observation'}->{'weather'});
      $element['#current_cond']['temp'] = SafeMarkup::checkPlain($parsed_json->{'current_observation'}->{'temp_f'});
      $element['#current_cond']['precip'] = SafeMarkup::checkPlain($parsed_json->{'current_observation'}->{'wind_mph'});
      $element['#timestamp'] = SafeMarkup::checkPlain('Updated: ' . $parsed_json->{'current_observation'}->{'local_time_rfc822'});

      $current_time = $parsed_json->{'hourly_forecast'}[0]->{'FCTTIME'}->{'hour'};
      $element['#forecast'] = $this->getForecast($parsed_json, $current_time);

      $element['#debug_info'][] = "TEST";
      $element['#debug_info'][] = count($element['#forecast']);

      /*try {

      } catch (Exception $e) {

      }*/

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
      // Return once we have all the hours we want
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
    // TODO: make $start_time and $end_time configurable in admin settings (remember to validate input)

    // Tennis-playing hours start at 8 AM and end at 10 PM (default values)
    $start_time = 8;
    $end_time = 22;
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
    elseif ($current_time <= $start_time) {
      // If earlier than start time, return number of hours to forecast for start time to end time (same day)
      $offset =  $start_time - $current_time - 1;
    }
    $future_count = $end_time - $start_time + 1;
    return array($future_count, $offset);

    // TODO: check if weekend, return ($future_count, $offset) accordingly
  }

  // source: http://tumbledesign.com/how-to-put-php-var_dump-in-a-variable/
  public static function grab_dump($var) {
    ob_start();
    var_dump($var);
    return ob_get_clean();
  }
}
