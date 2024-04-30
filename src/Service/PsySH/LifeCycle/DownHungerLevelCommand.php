<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Service\PsySH\LifeCycle;

use Iamyukihiro\Aquarium\UseCase\LifeCycle\DownHungerLevelUseCase;
use Psy\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DownHungerLevelCommand extends Command
{
    public function __construct(
        private DownHungerLevelUseCase $downHungerLevelUseCase
    ) {
        parent::__construct();
    }

    /**
     * {@inheritDoc}
     */
    protected function configure(): void
    {
        $this
            ->setName('down-hunger-level')
            ->setDescription('空腹レベルを1段階下げます');
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->downHungerLevelUseCase->down();

        return 0;
    }
}
