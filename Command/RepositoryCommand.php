<?php
namespace Klabisz\Command;

use Klabisz\Api\ServiceFactory;

class RepositoryCommand extends Command {

    public function execute($argc, $argv) {
        if ($argc > 2) {
            $repositoryPath = $argv[1];
            $branchName = $argv[2];

            $serviceName = $this->getOption("service:");

            $service = ServiceFactory::getService($serviceName);

        } else {
            throw new \Exception("Please specify at least repo path and branch name.");
        }
    }
}
