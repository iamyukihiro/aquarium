<?php

declare(strict_types=1);

use Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;
use Iamyukihiro\Aquarium\Service\PsySH\AddMedakaCommand;
use Iamyukihiro\Aquarium\Service\PsySH\InitTankCommand;
use Iamyukihiro\Aquarium\Service\PsySH\ViewTankCommand;

$tankPATH = dirname(__FILE__).'/../../.memory/tank.memory';

$tankManager = new TankManager($tankPATH);

return [
    'commands' => [
        new InitTankCommand($tankManager),
        new ViewTankCommand($tankManager),
        new AddMedakaCommand($tankManager)
    ],
    'defaultIncludes' => [
        __DIR__ . '/../../vendor/autoload.php',
    ],
    'startupMessage' => sprintf('<info>PHP Aquarium > ( ‘o’ ∋ )))<</info>'),
];
