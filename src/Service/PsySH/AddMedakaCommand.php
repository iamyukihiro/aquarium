<?php

declare(strict_types=1);

namespace Iamyukihiro\Aquarium\Service\PsySH;

use Iamyukihiro\Aquarium\Domain\Model\Fish\Medaka;
use Iamyukihiro\Aquarium\Domain\Model\Tank\TankManager;
use Iamyukihiro\Aquarium\Domain\VO\Variety;
use Psy\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddMedakaCommand extends Command
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
            ->setName('add-medaka')
            ->setDescription('メダカを追加します');
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $tank = $this->tankManager->load();
        $tank->addFish(new Medaka('メダカ', new Variety('みゆき'), 'Swim'));
        $this->tankManager->save($tank);
        clearstatcache();

        $output->writeln('水槽にメダカを追加しました');

        return 0;
    }
}
