<?php

namespace Drupal\tennis_weather\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a Tennis Weather block with which you can get foreast for a given ZIP.
 *
 * @Block(
 *   id = "tennis_weather_block",
 *   admin_label = @Translation("Tennis Weather block"),
 * )
 */

class TennisWeatherBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    // Return the form @ Form/TennisWeatherBlockForm.php
    return \Drupal::formBuilder()->getForm('Drupal\tennis_weather\Form\TennisWeatherBlockForm');
  }

  /**
    * {@inheritdoc}
    */
   protected function blockAccess(AccountInterface $account) {
     return AccessResult::allowedIfHasPermission($account, 'check weather');
   }

   /**
 * {@inheritdoc}
 */
public function blockForm($form, FormStateInterface $form_state) {

  $form = parent::blockForm($form, $form_state);

  $config = $this->getConfiguration();

  return $form;
}

/**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    //$this->setConfigurationValue('loremipsum_block_settings', $form_state->getValue('loremipsum_block_settings'));
  }

}
