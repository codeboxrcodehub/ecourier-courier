<?php

namespace Codeboxr\EcourierCourier\Exceptions;

use Throwable;
use Exception;

class EcourierException extends Exception
{
    private $errors;

    public function __construct($message = "", $code = 0, $errors = [], Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->errors = $errors;
    }

    /**
     * @return array
     */
    public function render()
    {
        return [
            'code'    => $this->code,
            'message' => $this->getMessage(),
            'errors'  => $this->errors
        ];
    }
}
