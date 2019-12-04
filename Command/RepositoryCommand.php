<?php
namespace Klabisz\Command;

use Klabisz\Api\ServiceFactory;

class RepositoryCommand extends Command {

    public function execute($argc, $argv) {
        if ($argc > 2) {
            $repositoryPath = $argv[$argc - 2];
            $branchName = $argv[$argc - 1];

            $serviceName = $this->getOption("service:");

            $service = ServiceFactory::getService($serviceName);
            $service->setRepository($repositoryPath);
            $service->setBranch($branchName);

            echo $service->getLastCommitSHA();

        } else {
            throw new \Exception("Please specify at least repo path and branch name.");
        }
    }
}
