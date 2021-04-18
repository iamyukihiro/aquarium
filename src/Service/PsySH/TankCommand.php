<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Service\PsySH;

use Goreboothero\Aquarium\Infrastructure\LoadTank;
use Psy\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TankCommand extends Command
{
    private LoadTank $loadTank;

    public function __construct(LoadTank $loadTank)
    {
        $this->loadTank = $loadTank;

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('tank')
            ->setDescription('水槽を閲覧します');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $tank = $this->loadTank->load();

        dd($tank);
    }
}
