<?php

namespace Drupal\tennis_weather\Controller;

use Drupal\Core\Url;
use Drupal\Component\Utility\SafeMarkup;

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

      $element['#subheading'] = SafeMarkup::checkPlain('For ZIP ' . $zip);
      $element['#summary'] = SafeMarkup::checkPlain('[WEATHER SUMMARY]');

      $element['#weather_text'] = SafeMarkup::checkPlain('weather text');

      $mysqli = new \mysqli("localhost", "root", "d8-testing", "weather");

      $dbInfo = "";
      if ($mysqli->connect_errno) {
        $dbInfo = "Failed to connect to MySQL: ("
                        . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      }
      $dbInfo = $mysqli->host_info;
      $element['#database_test'][] = SafeMarkup::checkPlain($dbInfo);

      $result = $mysqli->query("SELECT * FROM test");

      if ($result){
        $element['#database_test'][] = SafeMarkup::checkPlain('$result->num_rows: ' . $result->num_rows);
        while ($row = $result->fetch_assoc()) {
          $element['#database_test'][] = SafeMarkup::checkPlain("");
          $element['#database_test'][] = SafeMarkup::checkPlain('ZIP: ' . $row['zip']);
          $element['#database_test'][] = SafeMarkup::checkPlain('DATETIME: ' . $row['time']);
          $element['#database_test'][] = SafeMarkup::checkPlain('precipitation: ' . $row['precip'] . '%');
          $element['#database_test'][] = SafeMarkup::checkPlain('wind speed: ' . $row['wind'] . ' mph');
          $element['#database_test'][] = SafeMarkup::checkPlain('temperature: ' . $row['temp'] . ' (F)');
        }
      }
      else {
        // TODO: error handling
        $value = $result ? '?':'query returned $tempResult: FALSE';
        $element['#database_test'][] = SafeMarkup::checkPlain($value);
      }

      return $element;
  }
}
