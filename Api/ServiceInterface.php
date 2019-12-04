<?php
namespace Klabisz\Api;

interface ServiceInterface  {
    public function setRepository($repository);
    public function setBranch($branch);
    
    public function getLastCommitSHA();
}
