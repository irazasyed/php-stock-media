<?php

namespace Irazasyed\StockMedia;

class StockMedia {
    protected string $default;

    public function __construct(
        protected StockMediaFactory $factory = new StockMediaFactory()
    ) {

    }

    public function factory(): StockMediaFactory {
        return $this->factory;
    }

    public function service(): Contracts\StockServiceContract {
        return $this->factory()->getService( $this->getDefault() );
    }

    public function getDefault(): string {
        return $this->default;
    }

    public function setDefault( string $default ): static {
        $this->default = $default;

        return $this;
    }

    public function __call( string $method, array $parameters ) {
        return $this->service()->$method( ...$parameters );
    }
}
