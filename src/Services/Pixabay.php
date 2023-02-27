<?php

namespace Irazasyed\StockMedia\Services;

class Pixabay extends BaseService
{
    protected string $baseURL = 'https://pixabay.com/api';

    protected array $endpoints = [
        'video' => '/videos',
    ];

    public function search(array $params): array
    {
        $options = $this->buildPayload($params);

        $response = $this->httpClient()->get('', $options);

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
        $params['key'] = $this->getApiKey();

        return ['query' => $params];
    }
}
