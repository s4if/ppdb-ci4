<?php


define('APPPATH', dirname(__FILE__) . '/app/');
define('ENVIRONMENT', 'development');

chdir(APPPATH);

include_once 'vendor/autoload.php';
require __DIR__ . '/app/Libraries/Doctrine.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$doctrine = new App\Libraries\Doctrine;
$site_config = (new App\Libraries\SiteConfig)->config;

$em = $doctrine->em;


$reg = new \Entities\Registrant;
$reg->setUsername('user1');
$reg->setPassword(password_hash("password", PASSWORD_DEFAULT));
$reg->setName('User Satu');
$reg->setGender("L");
$reg->setPrevSchool("SMPN 1 Mungkid");
$reg->setNisn('000882838282');
$reg->setContact('088216405633');
$reg->setProgram("Reguler");
$reg->setRegTime((new \DateTime('now')));
$reg->setIsFinalized(False);
$reg->setIsDeleted(False);
$reg->setPhase($site_config->gelombang);
$em->persist($reg);
$em->flush();
echo "Entities 1 created\n";
