<?php

namespace Irazasyed\StockMedia\Services;

class Pexels extends BaseService
{
    protected string $baseURL = 'https://api.pexels.com';

    protected array $endpoints = [
        'photo' => '/v1/search',
        'video' => '/videos',
    ];

    public function search(array $params): array
    {
        $options = $this->buildPayload($params);

        $response = $this->httpClient()->get($this->endpoints['photo'], $options);

        return $this->responseToArray($response);
    }

    public function searchVideo(array $params): array
    {
        $options = $this->buildPayload($params);

        $response = $this->httpClient()->get($this->endpoints['video'], $options);

        return $this->responseToArray($response);
    }

    protected function buildPayload(array $params): array
    {
        $options = [];
        $options['query'] = $params;
        $options['headers']['Authorization'] = $this->getApiKey();

        return $options;
    }
}
