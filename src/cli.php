#!/usr/bin/env php
<?php
declare(strict_types=1);

require 'vendor/autoload.php';
include_once __DIR__ . '/Periodic.php';

$Periodic = new \SwitchCat\Periodic\Periodic();

// CLI OPTIONS
$shortopts  = "";
$shortopts .= "f:";
$shortopts .= "r:";
$shortopts .= "v:";
$options = getopt($shortopts);

if(!empty($options))
{
    switch ($options['f'])
    {
        case 'all':
            var_dump($Periodic->getAll());
            break;
        case 'name':
            var_dump($Periodic->getElementByName($options['r']));
            break;
        case 'symbol':
            var_dump($Periodic->getElementBySymbol($options['r']));
            break;
        case 'number':
            var_dump($Periodic->getElementByNumber((int)$options['r']));
            break;
        case 'category':
            var_dump($Periodic->getElementsByCategory($options['r']));
            break;
        case 'atomic':
            var_dump($Periodic->getElementsByAtomicMass((int)$options['r'], (int)$options['v']));
            break;
        case 'phase':
            var_dump($Periodic->getElementsByPhase($options['r']));
            break;
        case 'melt':
            var_dump($Periodic->getElementsByMeltingPoint((int)$options['r'], (int)$options['v']));
            break;
        case 'boil':
            var_dump($Periodic->getElementsByBoilingPoint((int)$options['r'], (int)$options['v']));
            break;
        case 'density':
            var_dump($Periodic->getElementsByDensity((int)$options['r'], (int)$options['v']));
            break;
    }
}