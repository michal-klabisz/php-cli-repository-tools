<?php
namespace Klabisz;
require __DIR__ . '/vendor/autoload.php';
use Klabisz\Command\RepositoryCommand;

class SingleCommandConsole {
    private $command;

    function __construct($command) {
        $this->command = $command;
    }

    public function runCommand($argc, $argv) {
        $this->command->execute($argc, $argv);
    }
}

$repositoryCommand = new RepositoryCommand();

$console = new SingleCommandConsole($repositoryCommand);

$console->runCommand($argc, $argv);
