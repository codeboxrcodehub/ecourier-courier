<?php

namespace Codeboxr\EcourierCourier\Exceptions;

use Throwable;
use Exception;

class EcourierValidationException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        if (is_array($message)) {
            $requiredColumnsImplode = implode(",", $message);
            parent::__construct("$requiredColumnsImplode filed is required", $code, $previous);
        } else {
            parent::__construct($message, $code, $previous);
        }
    }

    /*public function render()
    {
        return [
            "code"  => $this->code,
            "error" => $this->message
        ];
    }*/
}
