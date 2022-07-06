#!/usr/bin/env php
<?php

namespace Shimoning\SleepUtils;

require_once __DIR__ . '/vendor/autoload.php';

echo __NAMESPACE__ . " shell\n";
echo "-----\nexample:\n";
echo "echo microtime(true); echo \"\\n\"; Sleep::seconds(2); echo microtime(true);\n";
echo "-----\n\n";

$sh = new \Psy\Shell();

$sh->addCode(sprintf("namespace %s;", __NAMESPACE__));

$sh->run();

echo "\n-----\nBye.\n";
