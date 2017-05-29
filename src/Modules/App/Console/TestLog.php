<?php

namespace App\Modules\App\Console;

use Sintattica\Atk\Core\Atk;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TestLog extends Command
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
            ->setName('app:testLog')
            ->setDescription('Test log');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $vars = [
            'name' => 'test name',
            'description' => 'test description',
        ];

        $node = $this->app->atkGetNode('app.test_node');
        $record = $node->updateRecord($vars);
        $output->writeln(print_r($record, 1));

        if($node->addDb($record)){
            $node->getDb()->commit();
        }else{
            $output->writeln('errore add!');
        }
    }
}