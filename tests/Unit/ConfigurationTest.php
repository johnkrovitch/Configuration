<?php

namespace JK\Configuration\Tests\Unit;

use JK\Configuration\Configuration;
use JK\Configuration\Exception\AlreadyFrozenException;
use JK\Configuration\Exception\InvalidConfigurationException;
use JK\Configuration\Exception\NotFrozenException;
use PHPUnit\Framework\TestCase;

class ConfigurationTest extends TestCase
{
    public function testConfigure(): void
    {
        $configuration = $this->createConfiguration([
            'panda_parameter' => 'bamboo',
        ], [
            'location',
        ]);

        $configuration->configure([
            'location' => 'forest',
        ]);
        $this->assertTrue($configuration->isFrozen());
        $this->assertTrue($configuration->has('panda_parameter'));
        $this->assertTrue($configuration->has('location'));
        $this->assertEquals([
            'panda_parameter' => 'bamboo',
            'location' => 'forest',
        ], $configuration->toArray());
        $this->assertEquals('bamboo', $configuration->get('panda_parameter'));
    }

    public function testConfigureWithMissingRequiredParameter(): void
    {
        $configuration = $this->createConfiguration([
            'panda_parameter' => 'bamboo',
        ], [
            'location' => 'forest',
        ]);

        // A missing required options SHOULD throw an exception
        $this->expectException(InvalidConfigurationException::class);
        $configuration->configure();
    }

    public function testConfigureWithAlreadyFrozenConfiguration(): void
    {
        $configuration = $this->createConfiguration();
        $configuration->configure();

        // A configuration SHOULD not be modifiable once configured
        $this->expectException(AlreadyFrozenException::class);
        $configuration->configure();
    }

    public function testToArrayWithNotFrozenConfiguration(): void
    {
        $configuration = $this->createConfiguration();

        // A configuration SHOULD not be modifiable once configured
        $this->expectException(NotFrozenException::class);
        $configuration->toArray();
    }

    public function testGetWithNotFrozenConfiguration(): void
    {
        $configuration = $this->createConfiguration();

        // A configuration SHOULD not be modifiable once configured
        $this->expectException(NotFrozenException::class);
        $configuration->get('not_frozen');
    }

    private function createConfiguration(array $defaults = [], array $required = []): Configuration
    {
        return new FakeConfiguration($defaults, $required);
    }
}
