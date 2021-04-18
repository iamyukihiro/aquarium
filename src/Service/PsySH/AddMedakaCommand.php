<?php

declare(strict_types=1);

namespace Goreboothero\Aquarium\Service\PsySH;

use Goreboothero\Aquarium\Domain\Model\Fish\Medaka;
use Goreboothero\Aquarium\Domain\VO\Variety;
use Goreboothero\Aquarium\Infrastructure\LoadTank;
use Goreboothero\Aquarium\Infrastructure\SaveTank;
use Psy\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddMedakaCommand extends Command
{
    private LoadTank $loadTank;
    private SaveTank $saveTank;

    public function __construct(
        LoadTank $loadTank,
        SaveTank $saveTank
    ) {
        $this->loadTank = $loadTank;
        $this->saveTank = $saveTank;

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('add-medaka')
            ->setDescription('メダカを追加します');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $tank = $this->loadTank->load();

        $tank->addFish(new Medaka('メダカ', new Variety('みゆき')));

        $this->saveTank->save($tank);

        $output->writeln('水槽にメダカを追加しました');

        return 0;
    }
}
