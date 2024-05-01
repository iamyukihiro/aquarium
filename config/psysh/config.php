<?php

declare(strict_types=1);

use Iamyukihiro\Aquarium\Domain\Logic\NicknameGenerator;
use Iamyukihiro\Aquarium\Domain\Logic\Probability;
use Iamyukihiro\Aquarium\Domain\Logic\RandomLargeMouseBassGenerator;
use Iamyukihiro\Aquarium\Domain\Logic\RandomMedakaGenerator;
use Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;
use Iamyukihiro\Aquarium\Service\PsySH\AddMedakaCommand;
use Iamyukihiro\Aquarium\Service\PsySH\FeedCommand;
use Iamyukihiro\Aquarium\Service\PsySH\InitTankCommand;
use Iamyukihiro\Aquarium\Service\PsySH\LifeCycle\DownHungerLevelCommand;
use Iamyukihiro\Aquarium\Service\PsySH\ViewTankCommand;
use Iamyukihiro\Aquarium\UseCase\AddMedakaUseCase;
use Iamyukihiro\Aquarium\UseCase\LifeCycle\DownHungerLevelUseCase;
use Iamyukihiro\Aquarium\UseCase\FeedingUseCase;

$tankPATH = dirname(__FILE__).'/../../.memory/tank.memory';

$nicknameGenerator = new NicknameGenerator();
$randomMedakaGenerator = new RandomMedakaGenerator($nicknameGenerator);
$randomLargeMouseBassGenerator = new RandomLargeMouseBassGenerator($nicknameGenerator);
$probability = new Probability();
$tankManager = new TankManager($tankPATH);
$addMedakaUseCase = new AddMedakaUseCase($tankManager, $randomMedakaGenerator, $randomLargeMouseBassGenerator, $probability);
$feedingUseCase = new FeedingUseCase($tankManager);
$downHungerLevelUseCase = new DownHungerLevelUseCase($tankManager);

return [
    'commands' => [
        new InitTankCommand($tankManager),
        new ViewTankCommand($tankManager),
        new AddMedakaCommand($addMedakaUseCase),
        new FeedCommand($feedingUseCase),
        new DownHungerLevelCommand($downHungerLevelUseCase)
    ],
    'defaultIncludes' => [
        __DIR__ . '/../../vendor/autoload.php',
    ],
    'startupMessage' => '<info>PHP Aquarium > ( ‘o’ ∋ )))<</info>',
];
