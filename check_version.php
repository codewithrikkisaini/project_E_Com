<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
echo "Laravel Version: " . app()->version() . "\n";
echo "PHP Version: " . PHP_VERSION . "\n";
