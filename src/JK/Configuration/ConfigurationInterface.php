<?php

namespace JK\Configuration\Configuration;

use Symfony\Component\OptionsResolver\OptionsResolver;

interface ConfigurationInterface
{
    /**
     * Configure configuration allowed parameters.
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver);

    /**
     * Define resolved parameters.
     *
     * @param array $parameters
     */
    public function setParameters(array $parameters);

    /**
     * Return the value of a given parameter.
     *
     * @param string $name
     *
     * @return mixed
     */
    public function getParameter($name);

    /**
     * Return true if the given parameters exists.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasParameter($name);

    /**
     * Return an array containing all the parameters.
     *
     * @return array
     */
    public function getParameters();
}
