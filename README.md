# Configuration

Configuration class for Symfony projects. This package allows you to manipulate immutable configuration object. You can
add your custom getters to improve parameters php type, or you the default generic getters. 

## Installation
```
composer install johnkrovitch/configuration
```

v2.0: For Symfony 5.1+

v1.0: For Symfony 3.4, 4.4 (not maintained anymore)

## Usage

Create a configuration class.

```php
<?php

use JK\Configuration\Configuration;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MyConfiguration extends Configuration 
{
    public function configureOptions(OptionsResolver $resolver): void {
        // Configure your options resolver here 
        $resolver->setDefaults([
            'panda' => 'bamboo',
        ]);
    }
}

```

Use it in your service for example :
```php
<?php

use MyConfiguration;

class MyService {
    
    public function myMethod(array $options): void
    {
        $configuration = new MyConfiguration();
        $configuration->configure($options);

        $configuration->get('panda'); // Returns "bamboo"
        $configuration->has('panda'); // Returns true
        $configuration->toArray(); // Returns ['panda' => 'bamboo']        
    }

}

```

The Configuration use the Symfony [OptionsResolver component](https://symfony.com/doc/current/components/options_resolver.html) 
