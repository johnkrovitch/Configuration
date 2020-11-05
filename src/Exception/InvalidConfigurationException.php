<?php

namespace JK\Configuration\Exception;

use Exception;
use Throwable;

class InvalidConfigurationException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $message = 'An error occurred when resolving the configuration: '.$message;
        
        parent::__construct($message, $code, $previous);
    }
}
