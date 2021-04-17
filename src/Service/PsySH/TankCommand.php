<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Service\PsySH;

use Goreboothero\Aquarium\Domain\Model\Tank\Tank;
use Psy\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TankCommand extends Command
{
    private Tank $tank;

    public function __construct(Tank $tank)
    {
        $this->tank = $tank;

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
        dd($this->tank);
    }
}
