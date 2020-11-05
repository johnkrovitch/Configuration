<?php

namespace JK\Configuration\Exception;

use Exception;

class NotFrozenException extends Exception
{
    public function __construct()
    {
        parent::__construct('The configuration is not frozen. You should call the configure() or configureOptions()');
    }
}
