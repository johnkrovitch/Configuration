<?php

namespace JK\Configuration;

use Symfony\Component\OptionsResolver\OptionsResolver;

interface ConfigurationInterface
{
    /**
     * Resolve the given configuration array using the configureOptions() method. If a resolver is provided, it will be
     * used. Otherwise an new will be created.
     *
     * @return $this
     */
    public function configure(array $options = [], OptionsResolver $resolver = null): self;

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

    public function getBool(string $name): bool;

    public function getInt(string $name): int;

    public function getString(string $name): string;
}
