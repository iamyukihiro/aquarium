<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Service\PsySH;

use Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;
use Psy\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ViewTankCommand extends Command
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
            ->setName('view-tank')
            ->setDescription('水槽を覗きます');
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $tank = $this->tankManager->load();

        dd($tank);
    }
}
