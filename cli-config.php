<?php


define('APPPATH', dirname(__FILE__) . '/app/');
define('ENVIRONMENT', 'development');

chdir(APPPATH);

include_once 'vendor/autoload.php';
require __DIR__ . '/app/Libraries/Doctrine.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$doctrine = new App\Libraries\Doctrine;

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($doctrine->em);
