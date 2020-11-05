<?php

namespace JK\Configuration;

use Exception;
use JK\Configuration\Exception\AlreadyFrozenException;
use JK\Configuration\Exception\InvalidConfigurationException;
use JK\Configuration\Exception\NotFrozenException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Abstract configuration class. Use to have a configuration object instead of an raw array when the configuration is
 * big and need validation. Extends this class to implements the configureOptions() method.
 */
abstract class Configuration implements ConfigurationInterface
{
    protected ParameterBag $values;
    
    abstract public function configureOptions(OptionsResolver $resolver): void;
    
    public function configure(array $options = []): self
    {
        if ($this->isFrozen()) {
            throw new AlreadyFrozenException();
        }
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);
    
        try {
            $options = $resolver->resolve($options);
            $this->values = new FrozenParameterBag($options);
        } catch (Exception $exception) {
            throw new InvalidConfigurationException($exception->getMessage(), $exception->getCode(), $exception);
        }
    
        return $this;
    }
    
    public function toArray(): array
    {
        if (!$this->isFrozen()) {
            throw new NotFrozenException();
        }
    
        return $this->values->all();
    }
    
    public function get(string $name)
    {
        if (!$this->isFrozen()) {
            throw new NotFrozenException();
        }
    
        return $this->values->get($name);
    }
    
    public function has(string $name): bool
    {
        return $this->values->has($name);
    }
    
    public function isFrozen(): bool
    {
        return isset($this->values);
    }
}
