<?php

namespace WebpConverter\Error;

use WebpConverter\Loader\LoaderAbstract;
use WebpConverter\Loader\PassthruLoader;
use WebpConverter\PluginData;

/**
 * Checks for configuration errors about disabled file supports Pass Thru loader.
 */
class PassthruError implements ErrorInterface {

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

		do_action( LoaderAbstract::ACTION_NAME, true, true );

		if ( $this->if_passthru_execution_allowed() !== true ) {
			$errors[] = 'passthru_execution';
		}

		do_action( LoaderAbstract::ACTION_NAME, true );

		return $errors;
	}

	/**
	 * Checks if PHP file required for Passthru loader is available.
	 *
	 * @return bool Verification status.
	 */
	private function if_passthru_execution_allowed(): bool {
		$loader = new PassthruLoader( $this->plugin_data );
		if ( $loader->is_active_loader() !== true ) {
			return true;
		}

		$url = $loader::get_loader_url() . '?nocache=1';
		$ch  = curl_init( $url );
		if ( $ch === false ) {
			return false;
		}

		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_NOBODY, 1 );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		curl_setopt( $ch, CURLOPT_TIMEOUT, 3 );
		curl_exec( $ch );
		$code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
		curl_close( $ch );

		return ( $code === 200 );
	}
}
