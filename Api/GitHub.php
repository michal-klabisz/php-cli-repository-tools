<?php
namespace Klabisz\Api;

class GitHub implements ServiceInterface  {
    private const ROOT = "https://api.github.com";

    private const PATHS = [
        "commits" => "{ROOT}/repos/{REPOSITORY}/commits?sha={BRANCH}"
    ];

    private $repository;
    private $branch;

    public function setRepository($repository) {
        $this->repository = $repository;
    }

    public function setBranch($branch) {
        $this->branch = $branch;
    }

    public function getQuery($queryName) {
        if ($this->repository && $this->branch) {
            return str_replace(["{ROOT}", "{REPOSITORY}", "{BRANCH}"], [self::ROOT, $this->repository, $this->branch], self::PATHS[$queryName]);
        } else {
            throw new \Exception("Please specify repository path and branch name");
        }

    }

    public function getLastCommitSHA() {
        return $this->getQuery("commits");
    }
}
