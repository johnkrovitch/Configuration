<?php

namespace JK\Configuration\Configuration;

use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Abstract configuration class.
 */
abstract class Configuration implements ConfigurationInterface
{
    /**
     * @var ParameterBag
     */
    protected $parameters;

    /**
     * @var bool
     */
    protected $resolved = false;

    /**
     * Configuration constructor.
     */
    public function __construct()
    {
        $this->parameters = new FrozenParameterBag();
    }

    /**
     * Define allowed parameters and values for this configuration, using optionsResolver component.
     *
     * @param OptionsResolver $resolver
     */
    abstract public function configureOptions(OptionsResolver $resolver);

    /**
     * Return true if the parameter exists.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasParameter($name)
    {
        return $this
            ->parameters
            ->has($name);
    }

    /**
     * Return the parameter value.
     *
     * @param string $name
     *
     * @return mixed
     */
    public function getParameter($name)
    {
        return $this
            ->parameters
            ->get($name);
    }

    /**
     * Define all resolved parameters values.
     *
     * @param array $parameters
     */
    public function setParameters(array $parameters)
    {
        if (true === $this->resolved) {
            throw new LogicException('You can not set new parameters on a resolved Configuration');
        }
        $this->parameters = new FrozenParameterBag($parameters);
        $this->resolved = true;
    }

    /**
     * Return all parameters.
     *
     * @return array
     */
    public function getParameters()
    {
        return $this
            ->parameters
            ->all();
    }

    /**
     * Return true if the configuration array is resolved.
     *
     * @return bool
     */
    public function isResolved()
    {
        return $this->resolved;
    }
}
