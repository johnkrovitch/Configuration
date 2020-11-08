<?php

namespace JK\Configuration;

abstract class ServiceConfiguration extends Configuration
{
    public function __construct(array $configuration)
    {
        $this->configure($configuration);
    }
}
