<?php

declare(strict_types=1);

use Doctrine\Common\Annotations\AnnotationRegistry;

date_default_timezone_set('UTC');

$loader = require __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerLoader([$loader, 'loadClass']);

require_once __DIR__.'/Unit/FakeConfiguration.php';

return $loader;
