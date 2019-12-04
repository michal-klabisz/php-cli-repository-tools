<?php
namespace Klabisz\Command;

interface CommandInterface  {
    public function execute($argc, $argv);
}
