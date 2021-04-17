<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Service\PsySH;

use Psy\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TankCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('tank')
            ->setAliases([])
            ->setDefinition([
                new InputArgument('command_name', InputArgument::OPTIONAL, 'The command name.', null),
            ])
            ->setDescription('水槽を閲覧します')
            ->setHelp('My. How meta.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        dd();
    }
}
