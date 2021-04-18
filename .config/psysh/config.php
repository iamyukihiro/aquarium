<?php

use Goreboothero\Aquarium\Service\PsySH\TankCommand;
use Goreboothero\Aquarium\Infrastructure\LoadTank;

$tankPATH = dirname(__FILE__).'/../../.memory/tank.memory';

return [
    'commands' => [
        new TankCommand(new LoadTank($tankPATH))
    ],

    'defaultIncludes' => [
        __DIR__ . '/../../vendor/autoload.php',
    ],

    'startupMessage' => sprintf('<info>PHP Aquarium > ( ‘o’ ∋ )))<</info>'),
];