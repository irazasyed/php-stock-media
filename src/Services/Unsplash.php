<?php

namespace Irazasyed\StockMedia\Services;

class Unsplash extends BaseService
{
    protected string $baseURL = 'https://api.unsplash.com';

    protected array $endpoints = [
        'search' => '/search/photos',
        'random' => '/photos/random',
    ];

    public function search(array $params): array
    {
        $options = $this->buildPayload($params);

        $response = $this->httpClient()->get($this->endpoints['search'], $options);

        return $this->responseToArray($response);
    }

    public function searchRandom(array $params): array
    {
        $options = $this->buildPayload($params);

        $response = $this->httpClient()->get($this->endpoints['random'], $options);

        return $this->responseToArray($response);
    }

    protected function buildPayload(array $params): array
    {
        $options = [];
        $options['query'] = $params;
        $options['headers']['Authorization'] = 'Client-ID '.$this->getApiKey();

        return $options;
    }
}
