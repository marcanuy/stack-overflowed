#!/usr/bin/env php
<?php

require 'vendor/autoload.php';
require 'SOverflowed/Console/Command/LoginCommand.php';

use SOverflowed\Console\Command\LoginCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new StackOverflowLoginCommand);
$application->run();
