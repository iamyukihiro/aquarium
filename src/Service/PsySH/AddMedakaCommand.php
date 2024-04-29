<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Service\PsySH;

use Iamyukihiro\Aquarium\UseCase\AddMedakaUseCase;
use Psy\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddMedakaCommand extends Command
{
    public function __construct(
        private AddMedakaUseCase $addMedakaUseCase
    ) {
        parent::__construct();
    }

    /**
     * {@inheritDoc}
     */
    protected function configure(): void
    {
        $this
            ->setName('add-medaka')
            ->setDescription('メダカを追加します');
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->addMedakaUseCase->add();

        $output->writeln('水槽にメダカを追加しました');

        return 0;
    }
}
