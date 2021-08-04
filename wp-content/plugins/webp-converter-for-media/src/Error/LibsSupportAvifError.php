<?php

namespace WebpConverter\Error;

use WebpConverter\Conversion\Format\AvifFormat;
use WebpConverter\Conversion\Method\GdMethod;
use WebpConverter\Conversion\Method\ImagickMethod;
use WebpConverter\PluginData;

/**
 * Checks for configuration errors about image conversion methods that do not support AVIF output format.
 */
class LibsSupportAvifError implements ErrorInterface {

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
		$output_formats = $this->plugin_data->get_plugin_settings()['output_formats'] ?? [];
		$errors         = [];

		if ( in_array( AvifFormat::FORMAT_EXTENSION, $output_formats )
			&& ( $this->if_libs_support_avif() !== true ) ) {
			$errors[] = 'libs_without_avif_support';
		}
		return $errors;
	}

	/**
	 * Checks if any conversion method supports converting to AVIF format.
	 *
	 * @return bool Verification status.
	 */
	private function if_libs_support_avif(): bool {
		return ( GdMethod::is_method_active( AvifFormat::FORMAT_EXTENSION )
			|| ImagickMethod::is_method_active( AvifFormat::FORMAT_EXTENSION ) );
	}
}
