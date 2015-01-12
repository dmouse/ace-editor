<?php

/**
 * @file
 * Contains \Drupal\ace_editor\Plugin\Editor\AceEditor.
 */

namespace Drupal\ace_editor\Plugin\Editor;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\ckeditor\CKEditorPluginManager;
use Drupal\Core\Language\Language;
use Drupal\Core\Language\LanguageManager;
use Drupal\Core\Render\Element;
use Drupal\editor\Plugin\EditorBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\editor\Entity\Editor as EditorEntity;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\editor\Plugin\EditorPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a Ace editor for Drupal.
 *
 * @Editor(
 *   id = "ace_editor",
 *   label = @Translation("Ace Editor"),
 *   supports_content_filtering = TRUE,
 *   supports_inline_editing = FALSE,
 *   is_xss_safe = FALSE
 * )
 */
class AceEditor extends EditorBase implements ContainerFactoryPluginInterface {
	
	/**
   * The module handler to invoke hooks on.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * The language manager.
   *
   * @var \Drupal\Core\Language\LanguageManager
   */
  protected $languageManager;

  /**
   * Constructs a Drupal\Component\Plugin\PluginBase object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke hooks on.
   * @param \Drupal\Core\Language\LanguageManager $language_manager
   *   The language manager.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ModuleHandlerInterface $module_handler, LanguageManager $language_manager) 
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->moduleHandler = $module_handler;
    $this->languageManager = $language_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('module_handler'),
      $container->get('language_manager')
    );
  }

    /**
   * {@inheritdoc}
   */
  public function getDefaultSettings() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state, EditorEntity $editor) { 
    return $form;
  }


  /**
   * {@inheritdoc}
   */
  public function settingsFormSubmit(array $form, FormStateInterface $form_state) {
    
  }

  /**
   * {@inheritdoc}
   */
  public function getJSSettings(EditorEntity $editor) {
    $settings = [];
    return $settings;
  }

  /**
   * {@inheritdoc}
   */
  public function getLibraries(EditorEntity $editor) {
    $libraries = array(
      'ace_editor/drupal.ace'
    );
    return $libraries;
  }

}
