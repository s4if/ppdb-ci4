<?php

namespace App\Libraries;

include_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Doctrine\Common\ClassLoader;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Mapping\Driver\YamlDriver;

class Doctrine
{
    public $em;

    public function __construct()
    {
        $basepath = dirname(__DIR__, 2).'/';
        $connection_options = [];
        if ($_ENV['PPDB_DB_TYPE'] == 'SQLITE') {
            $connection_options = [
                'driver'    => 'pdo_sqlite',
                'path'      => $basepath.$_ENV['PPDB_DB_PATH']
            ];
        } else {
            $connection_options = [
                'driver'   => 'pdo_mysql',
                'user'     => $_ENV['PPDB_DB_USER'],
                'password' => $_ENV['PPDB_DB_PASSWORD'],
                'dbname'   => $_ENV['PPDB_DB_NAME'],
            ];
        }

        $models_namespace = 'Entities';
        $models_path = $basepath . 'app/Models';
        $proxies_dir = $basepath . 'app/Models/Proxies';
        $metadata_paths = array($basepath . 'app/Models/Entities');

        $dev_mode = ($_ENV['CI_ENVIRONMENT'] != 'production');
        $cache = null; // Produksi di implementasikan!
        $useSimpleAnnotationReader = false;
        $config = Setup::createAnnotationMetadataConfiguration($metadata_paths, $dev_mode, $proxies_dir, $cache, $useSimpleAnnotationReader);
        $this->em = EntityManager::create($connection_options, $config);
    }
}
