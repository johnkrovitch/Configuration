<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude([
        'bin',
        'build',
        'vendor',
    ])
;

return (new PhpCsFixer\Config())
    ->setFinder($finder)
    ->setCacheFile(__DIR__.'/var/.php-cs-fixer.cache')
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'phpdoc_align' => false,
        'yoda_style' => false,
        'elseif' => true,
        'declare_strict_types' => true,
    ])
;
