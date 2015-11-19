<?php
namespace App\Console;

use \blink\core\console\Command;
use \Illuminate\Database\Migrations\DatabaseMigrationRepository;
use \Illuminate\Database\Migrations\Migrator;
use \Illuminate\Filesystem\Filesystem;
use \Symfony\Component\Console\Input\InputArgument;
use \Symfony\Component\Console\Input\InputInterface;
use \Symfony\Component\Console\Output\OutputInterface;
use \Illuminate\Database\ConnectionResolver;

class MigrateCommand extends Command
{

    public $name = 'migrate';

    public $description = 'Migrate Database.';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $capsule = app('capsule');
        $connectionResolver = $capsule->getDatabaseManager();
        $repository = new DatabaseMigrationRepository($connectionResolver, 'migrations');
        if( !$repository->repositoryExists() )
        {
            $repository->createRepository();
        }

        $migrator = new Migrator($repository, $connectionResolver, new Filesystem);
        
        return $migrator->run(__DIR__.'/../database/migrations');
    }

    protected function configure()
    {
        //$this->addArgument('status', InputArgument::REQUIRED, 'Migrate `up`or `down`.');
    }
}