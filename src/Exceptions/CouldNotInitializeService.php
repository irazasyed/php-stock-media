<?php

namespace Irazasyed\StockMedia\Exceptions;

use Exception;

final class CouldNotInitializeService extends Exception {
	public static function apiKeyNotSet( string $service ): self {
		return new self( sprintf( 'API Key for the Stock Service [%s] Not Provided', $service ) );
	}

	public static function serviceNotSupported( string $service ): self {
		return new self( sprintf( 'Stock Service [%s] Not Supported', $service ) );
	}

	public static function serviceNotCompatible( string $service ): self {
		return new self( sprintf( 'Stock Service [%s] Not Compatible. Must implement StockServiceContract',
			$service ) );
	}
}
