<?php

$finder = \PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude([
        'bin',
        'build',
        'vendor',
    ])
;

return \PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony' => true,
        'yoda_style' => false,
    ])
    ->setFinder($finder)
;
