<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Service\PsySH;

use Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;
use Psy\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InitTankCommand extends Command
{
    public function __construct(
        private TankManager $tankManager
    ) {
        parent::__construct();
    }

    /**
     * {@inheritDoc}
     */
    protected function configure(): void
    {
        $this
            ->setName('init-tank')
            ->setDescription('水槽を初期化します');
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->tankManager->init();
        $output->writeln('水槽を初期化しました');

        return 0;
    }
}
