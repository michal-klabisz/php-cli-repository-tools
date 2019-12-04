<?php
namespace Klabisz\Console;

class SingleCommandConsole implements ConsoleInterface {
    private $command;

    function __construct($command) {
        $this->command = $command;
    }

    public function runCommand($argc, $argv) {
        $this->command->execute($argc, $argv);
    }
}
