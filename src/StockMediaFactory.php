<?php

namespace Irazasyed\StockMedia;

use Irazasyed\StockMedia\Contracts\StockServiceContract;
use Irazasyed\StockMedia\Exceptions\CouldNotInitializeService;
use Irazasyed\StockMedia\Services\Pexels;
use Irazasyed\StockMedia\Services\Pixabay;
use Irazasyed\StockMedia\Services\Unsplash;

class StockMediaFactory
{
    protected array $services = [
        Pexels::class,
        Pixabay::class,
        Unsplash::class,
    ];

    public static function create(): static
    {
        return new static();
    }

    public function addServices(array $services): static
    {
        foreach ($services as $service) {
            $this->addService($service);
        }

        return $this;
    }

    public function getServices(): array
    {
        return $this->services;
    }

    public function addService(StockServiceContract|string $service): static
    {
        if (is_string($service)) {
            $service = new $service();

            if (! $service instanceof StockServiceContract) {
                throw CouldNotInitializeService::serviceNotCompatible($service);
            }
        }

        $this->services[] = $service;

        return $this;
    }

    public function getService(string $service): StockServiceContract
    {
        $serviceClass = in_array($service, $this->services, true) ? $service : null;

        if (! $serviceClass) {
            throw CouldNotInitializeService::serviceNotSupported($service);
        }

        if (is_string($serviceClass)) {
            return new $serviceClass();
        }

        return $serviceClass;
    }
}
