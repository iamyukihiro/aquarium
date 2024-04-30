<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Service\PsySH;

use Iamyukihiro\Aquarium\UseCase\FeedingUseCase;
use Psy\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FeedCommand extends Command
{
    public function __construct(
        private FeedingUseCase $upHungerLevelUseCase
    ) {
        parent::__construct();
    }

    /**
     * {@inheritDoc}
     */
    protected function configure(): void
    {
        $this
            ->setName('feed')
            ->setDescription('エサを与えます');
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->upHungerLevelUseCase->up();

        return 0;
    }
}
