<?php
namespace Klabisz\Api;

class GitHub implements ServiceInterface  {
    private $repository;
    private $branch;

    public function setRepository($repository) {
        $this->repository = $repository;
    }

    public function setBranch($branch) {
        $this->branch = $branch;
    }

    public function getLastCommitSHA() {

    }
}
