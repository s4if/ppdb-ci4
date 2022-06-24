<?php

namespace Config;

use CodeIgniter\Config\BaseService;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{
    /*
     * public static function example($getShared = true)
     * {
     *     if ($getShared) {
     *         return static::getSharedInstance('example');
     *     }
     *
     *     return new \CodeIgniter\Example();
     * }
     */

    //DOCTRINE SERVICE CLASS
    public static function doctrine($getShared = true){
        if ($getShared)
        {
            return static::getSharedInstance('doctrine');
        }
        // INITIATE
        $doctrine = new \App\Libraries\Doctrine;
        // SHORTCUT ENTITY MANAGER
        $em = $doctrine->em;
        // RETURN ENTITY MANAGER
        return $em;
    }

    //SITE_CONFIG SERVICE CLASS
    public static function site_config($getShared = true){
        if ($getShared)
        {
            return static::getSharedInstance('site_config');
        }
        $site_config = new \App\Libraries\SiteConfig;
        $config = $site_config->config;
        return $config;
    }
}
