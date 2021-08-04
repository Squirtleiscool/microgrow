<?php

namespace WebpConverter\Error;

use WebpConverter\PluginData;

/**
 * Checks for configuration errors about incorrectly saved plugin settings.
 */
class SettingsError implements ErrorInterface {

	/**
	 * @var PluginData .
	 */
	private $plugin_data;

	/**
	 * @param PluginData $plugin_data .
	 */
	public function __construct( PluginData $plugin_data ) {
		$this->plugin_data = $plugin_data;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_error_codes(): array {
		$errors = [];

		if ( $this->if_settings_are_correct() !== true ) {
			$errors[] = 'settings_incorrect';
		}
		return $errors;
	}

	/**
	 * Checks if plugin settings are correct.
	 *
	 * @return bool Verification status.
	 */
	private function if_settings_are_correct(): bool {
		$settings = $this->plugin_data->get_plugin_settings();
		if ( ( ! isset( $settings['extensions'] ) || ! $settings['extensions'] )
			|| ( ! isset( $settings['dirs'] ) || ! $settings['dirs'] )
			|| ( ! isset( $settings['method'] ) || ! $settings['method'] )
			|| ( ! isset( $settings['output_formats'] ) || ! $settings['output_formats'] )
			|| ( ! isset( $settings['quality'] ) || ! $settings['quality'] ) ) {
			return false;
		}

		return true;
	}
}
