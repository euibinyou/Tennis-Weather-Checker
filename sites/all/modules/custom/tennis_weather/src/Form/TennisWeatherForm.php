<?php

/**
 * @file
 * Contains \Drupal\loremipsum\Form\LoremIpsumForm.
 */

namespace Drupal\tennis_weather\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class TennisWeatherForm extends ConfigFormBase {

  /**
   * {@inheritdoc}.
   */
  public function getFormId() {
    return 'tennisweather_form';
  }

  /**
   * {@inheritdoc}.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Form constructor
    $form = parent::buildForm($form, $form_state);
    // Default settings
    $config = $this->config('tennis_weather.settings');

    $hourOptions = array_combine(range(1,12),range(1,12));
    $ampmOptions = array_combine(array('AM', 'PM'), array('AM', 'PM'));

    $form['start_hr'] = array(
      '#type' => 'select',
      '#title' => $this->t('start time'),
      '#default_value' => $config->get('tennis_weather.start_hr'),
      '#description' => $this->t('Start time for playing tennis.'),
      '#options' => $hourOptions,
    );
    $form['start_ampm'] = array(
      '#type' => 'select',
      '#title' => $this->t('start AM/PM'),
      '#description' => $this->t('Start AM/PM for playing tennis.'),
      '#default_value' => $config->get('tennis_weather.start_ampm'),
      '#options' => $ampmOptions,
    );

    $form['end_hr'] = array(
      '#type' => 'select',
      '#title' => $this->t('end time'),
      '#default_value' => $config->get('tennis_weather.end_hr'),
      '#description' => $this->t('End time for playing tennis.'),
      '#options' => $hourOptions,
    );
    $form['end_ampm'] = array(
      '#type' => 'select',
      '#title' => $this->t('end AM/PM'),
      '#description' => $this->t('End AM/PM for playing tennis.'),
      '#default_value' => $config->get('tennis_weather.end_ampm'),
      '#options' => $ampmOptions,
    );

    $form['temp_max'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Max Temperature'),
      '#default_value' => $config->get('tennis_weather.temp_max'),
      '#description' => $this->t('Maximum playable temperature'),
    );
    $form['temp_warn'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Warning Temperature'),
      '#default_value' => $config->get('tennis_weather.temp_warn'),
      '#description' => $this->t('Minimum warning temperature'),
    );

    $form['wind_max'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Max Wind Speed'),
      '#default_value' => $config->get('tennis_weather.wind_max'),
      '#description' => $this->t('Maximum playable wind speed'),
    );
    $form['wind_warn'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Warning Wind Speed'),
      '#default_value' => $config->get('tennis_weather.wind_warn'),
      '#description' => $this->t('Minimum warning wind speed'),
    );

    $form['precip_max'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Max Chance of Precipitation'),
      '#default_value' => $config->get('tennis_weather.precip_max'),
      '#description' => $this->t('Maximum playable chance of precipitation'),
    );
    $form['precip_warn'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Warning Chance of Precipitation'),
      '#default_value' => $config->get('tennis_weather.precip_warn'),
      '#description' => $this->t('Minimum warning chance of precipitation'),
    );

    return $form;
  }

  /**
   * {@inheritdoc}.
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $temp_max = $form_state->getValue('temp_max');
    $temp_warn = $form_state->getValue('temp_warn');
    $wind_max = $form_state->getValue('wind_max');
    $wind_warn = $form_state->getValue('wind_warn');
    $precip_max = $form_state->getValue('precip_max');
    $precip_warn = $form_state->getValue('precip_warn');
    $start_hr = $form_state->getValue('start_hr');
    $start_ampm = $form_state->getValue('start_ampm');
    $end_hr = $form_state->getValue('end_hr');
    $end_ampm = $form_state->getValue('end_ampm');

    if (!self::isStringVaildInt($temp_max) || !self::isStringVaildInt($temp_warn)) {
      $form_state->setErrorByName(
        'Temperature',
        $this->t("You must enter an integer (max 3 digits).")
      );
  	}
    if ($temp_warn > $temp_max) {
      $form_state->setErrorByName(
        'Temperature',
        $this->t("Warning threshold is cannot be greater than max threshold!")
      );
    }

    if (!self::isStringVaildInt($wind_max) || $wind_warn < 0 ||
        !self::isStringVaildInt($wind_warn)) {
      $form_state->setErrorByName(
        'Wind',
        $this->t("You must enter an integer 0 or higher (max 3 digits).")
      );
  	}
    if ($wind_warn > $wind_max) {
      $form_state->setErrorByName(
        'Wind',
        $this->t("Warning threshold is cannot be greater than max threshold!")
      );
    }

    if (!self::isStringVaildInt($precip_max) || $precip_max > 100 || $precip_warn < 0 ||
        !self::isStringVaildInt($precip_warn)) {
      $form_state->setErrorByName(
        'Precipitation',
        $this->t("You must enter an integer between 0 and 100.")
      );
  	}
    if ($precip_warn > $precip_max) {
      $form_state->setErrorByName(
        'Precipitation',
        $this->t("Warning threshold is cannot be greater than max threshold!")
      );
    }

    if (!self::validateHours($start_hr, $start_ampm, $end_hr, $end_ampm)) {
      $form_state->setErrorByName(
        'Playing hours',
        $this->t("Start and end time range should be between 1 and 23 hours.")
      );
    }
  }

  /**
   * {@inheritdoc}.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('tennis_weather.settings');
    $config->set('tennis_weather.temp_max', $form_state->getValue('temp_max'));
    $config->set('tennis_weather.temp_warn', $form_state->getValue('temp_warn'));
    $config->set('tennis_weather.wind_max', $form_state->getValue('wind_max'));
    $config->set('tennis_weather.wind_warn', $form_state->getValue('wind_warn'));
    $config->set('tennis_weather.precip_max', $form_state->getValue('precip_max'));
    $config->set('tennis_weather.precip_warn', $form_state->getValue('precip_warn'));
    $config->set('tennis_weather.start_hr', $form_state->getValue('start_hr'));
    $config->set('tennis_weather.start_ampm', $form_state->getValue('start_ampm'));
    $config->set('tennis_weather.end_hr', $form_state->getValue('end_hr'));
    $config->set('tennis_weather.end_ampm', $form_state->getValue('end_ampm'));

    $config->save();
    return parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}.
   */
  protected function getEditableConfigNames() {
    return [
      'tennis_weather.settings',
    ];
  }

/**
 * Check if start hour - end hour is a valid range.
 * Valid if <= 24 hours.
 * @param string $start_hr
 * @param string $start_ampm
 * @param string $end_hr
 * @param string $end_ampm
 * @return boolean
 */
  public function validateHours($start_hr, $start_ampm, $end_hr, $end_ampm) {
    // convert 12-hr format to 24 format for range calculation
    if ($start_ampm == 'PM') {
      $start_hr += 12;
    }
    if ($end_ampm == 'PM') {
      $end_hr += 12;
    }

    // range exceeds 23 hours
    if (($end_hr - $start_hr) > 23) {
      return False;
    }

    // range is less than 1 hour
    if (($end_hr - $start_hr) < 1) {
      return False;
    }

    return True;
  }

  /**
   * Check if a given string represents a valid integer value (3 digit integer).
   * @param string $string
   * @return boolean
   */
  public function isStringVaildInt($string) {
     return (1 === preg_match('/^-?\d{1,3}$/', $string));
  }

}
