#!/usr/bin/php

<?php
if (php_sapi_name() !== 'cli') {
    exit;
}

require __DIR__ . '/vendor/autoload.php';

use Klabisz\Command\RepositoryCommand;
use Klabisz\Console\SingleCommandConsole;

try {
    
    $repositoryCommand = new RepositoryCommand();

    $console = new SingleCommandConsole($repositoryCommand);

    $console->runCommand($argc, $argv);

} catch (\Exception $e) {
    echo $e->getMessage();
}
