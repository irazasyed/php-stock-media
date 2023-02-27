<?php

namespace Irazasyed\StockMedia\Http;

use Irazasyed\StockMedia\Exceptions\CouldNotFetch;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class HttpClient {
	public function __construct(
		protected string $baseURL = '',
		protected array $options = [],
		protected ?ClientInterface $httpClient = null
	) {
		$this->options = array_merge( [
			'base_uri' => $this->baseURL,
		], $options );
	}

	public function getOptions(): array {
		return $this->options;
	}

	public function setOptions( array $options ): static {
		$this->options = $options;

		return $this;
	}

	public function getHttpClient(): ClientInterface {
		if ( ! $this->httpClient ) {
			$this->httpClient = new Client( $this->options );
		}

		return $this->httpClient;
	}

	public function setHttpClient( ClientInterface $httpClient ): static {
		$this->httpClient = $httpClient;

		return $this;
	}

	public function get( string $url, array $options = [] ): string|ResponseInterface|null {
		return $this->sendRequest( 'GET', $url, $options );
	}

	public function post( string $url, array $options = [] ): string|ResponseInterface|null {
		return $this->sendRequest( 'POST', $url, $options );
	}

	protected function put( string $url, array $options = [] ): string|ResponseInterface|null {
		return $this->sendRequest( 'PUT', $url, $options );
	}

	protected function delete( string $url, array $options = [] ): string|ResponseInterface|null {
		return $this->sendRequest( 'DELETE', $url, $options );
	}

	/**
	 * Send a request to the API
	 *
	 * @param string $method
	 * @param string $url
	 * @param array  $options
	 *
	 * @return string|ResponseInterface|null
	 */
	protected function sendRequest( string $method, string $url, array $options = [] ): string|ResponseInterface|null {
		try {
			$response = $this->getHttpClient()->request( $method, $url, $options );

			return $response->getBody()->getContents();
		} catch ( ClientException $e ) {
			throw CouldNotFetch::serviceRespondedWithAnError($e);
		}
	}
}
