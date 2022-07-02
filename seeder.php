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
echo "Registrant user1 created\n";

$regDetail = new \Entities\RegistrantDetail;
$detail = [
	'nik' => 43824837,
    'nkk' => 43824837,
    'nak' => 43824837,
    'birth_place' => "Magelang",
    'birth_date'=> \DateTime::createFromFormat('Y-m-d', "2005-05-25"),
    'child_order' => 1,
    'siblings_count' => 2,
    'street' => 'Kenajen',
    'rt' => 1,
    'rw' => 3,
    'village' => 'Blondo',
    'district' => 'Mungkid',
    'city' => 'Kab. Magelang',
    'province' => 'Jawa Tengah',
    'country' => 'Indonesia',
    'postal_code' => 56513,
    'family_condition' => "lengkap",
    'nationality' => "WNI",
    'religion' => "Islam",
    'hospital_sheets' => 'maag;typhus',
    'physical_abnormalities' => 'Pernah Patah Tulang Kaki',
    'height' => 178,
    'weight' => 67,
    'head_size' => 46,
    'stay_with' => "kedua orang tua",
    'hobbies' => 'Membaca;Menulis',
    'achievements' => null,
];
$regDetail->setArray($detail);
$regDetail->setRegistrant($reg);
$reg->setRegistrantDetail($regDetail);
$em->persist($regDetail);
$em->persist($reg);
$em->flush();
echo "Registrant Data Created \n";