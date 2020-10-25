<?php


namespace Bootstrap\Exceptions;

use Throwable;

/**
 * Class RouteDoesNotExist
 * @package Bootstrap\Exceptions
 */
class RouteDoesNotExist extends \Exception
{
    /**
     * RouteDoesNotExist constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "Route does not exist.", $code = 404, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}