<?php

namespace Irazasyed\StockMedia\Services;

use Irazasyed\StockMedia\Contracts\StockServiceContract;
use Irazasyed\StockMedia\Exceptions\CouldNotInitializeService;
use Irazasyed\StockMedia\Http\HttpClient;

abstract class BaseService implements StockServiceContract
{
    protected string $baseURL;

    protected array $httpOptions = [];

    protected ?HttpClient $httpClient = null;

    public function __construct(protected string $apiKey = '')
    {
    }

    public static function new(string $apiKey): static
    {
        return new static($apiKey);
    }

    public function setApiKey(string $apiKey): static
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    public function getApiKey(): string
    {
        return $this->apiKey === ''
            ? throw CouldNotInitializeService::apiKeyNotSet(static::class)
            : $this->apiKey;
    }

    public function setBaseURL(string $baseURL): static
    {
        $this->baseURL = $baseURL;

        return $this;
    }

    public function setHttpOptions(array $options): static
    {
        $this->httpOptions = $options;

        return $this;
    }

    public function httpClient(): HttpClient
    {
        if (! $this->httpClient) {
            $this->httpClient = new HttpClient($this->baseURL, $this->httpOptions);
        }

        return $this->httpClient;
    }

    /**
     * @throws \JsonException
     */
    protected function responseToArray(string $response): array
    {
        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }
}
