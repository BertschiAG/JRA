<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: ConfigFactory.php
 * Date: 04.01.2016
 * Time: 14:20
 */

namespace JRA\Factories;


use JRA\Config\ARSAnnatech;
use JRA\Config\Authenticate;
use JRA\Config\Helper\Versions;
use JRA\Config\Server;
use JRA\Config\Version;
use JRA\Facades\ConfigFacade;

class ConfigFactory
{
    public function getNewConfigFacade($pVersion = Versions::API_VERSION_LATEST, $pAuthMethod = Authenticate::AUTH_METHOD_HEADER_TOKEN, $pAutoLogin = Authenticate::AUTH_AUTO_LOGIN_ON)
    {
        return
            new ConfigFacade(
                new ARSAnnatech(),
                new Authenticate($pAuthMethod, $pAutoLogin),
                new Server($pVersion),
                new Version($pVersion)
            );
    }
}