<?php

declare(strict_types=1);

namespace JK\Configuration\Exception;

use Exception;

class AlreadyFrozenException extends Exception
{
    public function __construct()
    {
        parent::__construct('The configuration is already frozen. You can not configure it again');
    }
}
