#!/usr/bin/php

<?php
if (php_sapi_name() !== 'cli') {
    exit;
}

require_once __DIR__ . "/SingleCommandConsole.php";
