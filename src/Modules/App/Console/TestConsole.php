<?php

namespace App\Modules\App\Console;

use Sintattica\Atk\Core\Atk;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TestConsole extends Command
{

    /** @var Atk $app */
    private $app;

    public function __construct(Atk $app, $name = null)
    {
        $this->app = $app;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this
            ->addOption('env', 'e', InputOption::VALUE_OPTIONAL, 'Environment', $this->app->getEnvironment())
            ->setName('app:testConsole')
            ->setDescription('Test console');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('test Console!');
    }
}