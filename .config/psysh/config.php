<?php

use Goreboothero\Aquarium\Infrastructure\SaveTank;
use Goreboothero\Aquarium\Service\PsySH\AddMedakaCommand;
use Goreboothero\Aquarium\Service\PsySH\TankCommand;
use Goreboothero\Aquarium\Infrastructure\LoadTank;

$tankPATH = dirname(__FILE__).'/../../.memory/tank.memory';

return [
    'commands' => [
        new TankCommand(new LoadTank($tankPATH)),
        new AddMedakaCommand(new LoadTank($tankPATH), new SaveTank($tankPATH))
    ],

    'defaultIncludes' => [
        __DIR__ . '/../../vendor/autoload.php',
    ],

    'startupMessage' => sprintf('<info>PHP Aquarium > ( ‘o’ ∋ )))<</info>'),
];