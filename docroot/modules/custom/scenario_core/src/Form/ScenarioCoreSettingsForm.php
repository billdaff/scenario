<?php

namespace Drupal\scenario_core\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Scenario Core's settings for this site.
 */
class ScenarioCoreSettingsForm extends ConfigFormBase {

  /**
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'scenario_core.settings';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'scenario_core_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      static::SETTINGS,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(static::SETTINGS);

    $form['enable_ecommerce'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable E-Commerce'),
      '#default_value' => $config->get('enable_ecommerce'),
    ];

    $form['elastic_path_api_key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Elastic Path API Key'),
      '#default_value' => $config->get('elastic_path_api_key'),
    ];

    $form['elastic_path_secret_key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Elastic Path Secret Key'),
      '#default_value' => $config->get('elastic_path_secret_key'),
    ];

    $form['elastic_path_endpoint'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Elastic Path Endpoint'),
      '#default_value' => $config->get('elastic_path_endpoint'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration.
    $this->configFactory->getEditable(static::SETTINGS)
      // Set the submitted configuration setting.
      ->set('enable_ecommerce', $form_state->getValue('enable_ecommerce'))
      ->set('elastic_path_api_key', $form_state->getValue('elastic_path_api_key'))
      ->set('elastic_path_secret_key', $form_state->getValue('elastic_path_secret_key'))
      ->set('elastic_path_endpoint', $form_state->getValue('elastic_path_endpoint'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
