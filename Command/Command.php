<?php
namespace Klabisz\Command;

abstract class Command {
    abstract public function execute($argc, $argv);

    public function getOption($optionName) {
        $options = getopt("", [$optionName]);

        return !empty($options) ? current($options) : false;
    }
}
