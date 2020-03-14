<?php

/**
 * Created by PhpStorm.
 * User: inle
 * Date: 13.03.20
 * Time: 6:01
 */
namespace Robotateme\Validation\Exceptions;

use Exception;
use Throwable;

class ValidationException extends Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}