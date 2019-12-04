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

    protected function getQuery($queryName) {
        if ($this->repository && $this->branch) {
            $context = stream_context_create(
                array(
                    "http" => array(
                        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
                    )
                )
            );

            $queryPath = str_replace(["{ROOT}", "{REPOSITORY}", "{BRANCH}"], [self::ROOT, $this->repository, $this->branch], self::PATHS[$queryName]);

            $response = @file_get_contents($queryPath, false, $context);

            if (false === $response) {
                throw new \Exception("No results or connection problem");
            }

            return json_decode($response);
        } else {
            throw new \Exception("Please specify repository path and branch name");
        }

    }

    public function getLastCommitSHA() {
        $queryResults = $this->getQuery("commits");

        if (is_array($queryResults) && !empty($queryResults)) {
            $firstResult = current($queryResults);

            return $firstResult->sha;
        } else {
            throw new \Exception("No results.");
        }
    }
}
