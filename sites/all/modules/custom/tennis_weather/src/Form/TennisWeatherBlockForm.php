<?php

/**
 * @file
 * Contains \Drupal\tennis_weather\Form\BlockFormController
 */

namespace Drupal\tennis_weather\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Tennis Weather block form
 */
class TennisWeatherBlockForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'tennis_weather_block_form';
  }

  /**
   * {@inheritdoc}
   * Tennis Weather block.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Zip
    $form['zip'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('ZIP'),
      '#description' => $this->t('5-digit ZIP code'),
    );

    // Submit
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Go'),
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $zip = $form_state->getValue('zip');
    if  (1 !== preg_match('/^\d{5}$/', $zip)) {
      $form_state->setErrorByName('zip', $this->t('Please enter a valid 5-digit ZIP code.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $zip = $form_state->getValue('zip');
    $form_state->setRedirect(
      'tennis_weather.content',
      array(
        'zip' => $form_state->getValue('zip'),
      )
    );
  }
}
