<?php

namespace App\Libraries;

include_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class SiteConfig
{
    public $config;

    public function __construct()
    {
        $basepath = dirname(__DIR__, 2).'/';
        // Get the contents of the JSON file 
        $json_str = file_get_contents($basepath."site_config.json");
        $json_config = json_decode($json_str, False);
        if (is_null($json_config)) {
            throw new \Exception("Error, File site_config.json tidak valid.", 1);
        }
        // Convert to array 
        $this->config = $json_config;
    }
}
