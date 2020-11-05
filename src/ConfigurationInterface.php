<?php

namespace JK\Configuration;

use Symfony\Component\OptionsResolver\OptionsResolver;

interface ConfigurationInterface
{
    /**
     * Resolve the given configuration array using the configureOptions() method.
     *
     * @return $this
     */
    public function configure(array $options = []): self;

    /**
     * Return the configuration object values into an array.
     */
    public function toArray(): array;

    /**
     * Return the value of the given parameter.
     *
     * @return mixed
     */
    public function get(string $name);

    /**
     * Return true if the given parameter exists in the configuration.
     */
    public function has(string $name): bool;

    /**
     * Return true if the configuration is frozen.
     */
    public function isFrozen(): bool;

    /**
     * Configure the configuration object with a resolver.
     */
    public function configureOptions(OptionsResolver $resolver): void;
}
