<?php

declare(strict_types=1);

namespace JK\Configuration\Tests\Unit;

use JK\Configuration\Configuration;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FakeConfiguration extends Configuration
{
    private array $defaults;
    private array $required;

    public function __construct(array $defaults = [], array $required = [])
    {
        $this->defaults = $defaults;
        $this->required = $required;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults($this->defaults);
        $resolver->setRequired($this->required);
    }
}
