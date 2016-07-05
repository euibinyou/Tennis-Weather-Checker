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

    // default date
    //$date = '08:00 AM';
    $date = '2016-07-01 08:00:00';
    // 12-hr AM/PM
    $format = 'g A';

    //$options = array_combine(range(0,23),list(1,10));
    //$options = array_combine(range(0,23),range(0,23));
    // $form['hours'] = array(
    //   '#type' => 'datetime',
    //   '#title' => $this->t('Tennis-playing hours'),
    //   '#default_value' => $date,
    //   '#description' => $this->t('Start and end times for playing tennis.'),
    //   '#date_label_position' => 'within',
    //   '#date_format' => $format,
    // );
    //
    // $form['hours'] = array(
    //   '#type' => 'datetime',
    //   '#title' => $this->t('datetime test'),
    //   '#default_value' => $date,
    //   '#description' => $this->t('datetime field type'),
    //   '#date_format' => $format,
    // );

    $hourOptions = array_combine(range(1,12),range(1,12));
    //$ampmOptions = array_combine(array(t('AM'), t('PM')),array(t('AM'), t('PM')));
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

}
