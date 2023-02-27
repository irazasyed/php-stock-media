<?php

namespace Irazasyed\StockMedia\Exceptions;

use Exception;
use GuzzleHttp\Exception\ClientException;

final class CouldNotFetch extends Exception {
	/**
	 * Thrown when there's a bad request and an error is responded.
	 *
	 * @param ClientException $exception
	 *
	 * @return self
	 */
	public static function serviceRespondedWithAnError( ClientException $exception ): self {
		if ( ! $exception->hasResponse() ) {
			return new self( 'Stock service responded with an error but no response body found' );
		}

		$statusCode = $exception->getResponse()->getStatusCode();

		$body = $exception->getResponse()->getBody()->getContents();

		return new self( "Stock service responded with an error: `Status Code: {$statusCode} | Response: {$body}`", 0,
			$exception );
	}
}
