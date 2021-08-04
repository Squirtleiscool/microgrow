<?php

namespace WebpConverter\Error;

/**
 * Interface for class that checks for configuration errors.
 */
interface ErrorInterface {

	/**
	 * Returns list of error codes.
	 *
	 * @return string[] Error codes.
	 */
	public function get_error_codes(): array;
}
