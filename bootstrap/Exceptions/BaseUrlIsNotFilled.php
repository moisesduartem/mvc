<?php


namespace Bootstrap\Exceptions;


use Throwable;

/**
 * Class BaseUrlIsNotFilled
 * @package Bootstrap\Exceptions
 */
class BaseUrlIsNotFilled extends \Exception
{
    /**
     * BaseUrlIsNotFilled constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "The BASE_URL constant is not filled at .env file.", $code = 0, Throwable $previous = null)
   {
       parent::__construct($message, $code, $previous);
   }
}