<?php

use Goreboothero\Aquarium\Service\PsySH\TankCommand;

return [
    'commands' => [
        new TankCommand()
    ],

    'defaultIncludes' => [
        __DIR__ . '/../../vendor/autoload.php',
    ],

    'startupMessage' => sprintf('<info>PHP Aquarium > ( ‘o’ ∋ )))<</info>'),
];