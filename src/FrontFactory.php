<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2015
 * User: jbaumann
 * File: FrontFactory.php
 * Date: 23.12.2015
 * Time: 08:31
 */

namespace JRA;


use JRA\Config\Authenticate;
use JRA\Facades\APIFacade;
use JRA\Factories\ConfigFactory;
use JRA\Config\Helper\Versions;
use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;


class FrontFactory
{
    public function getNewConfigObject($pVersion = Versions::API_VERSION_LATEST, $pAuthMethod = Authenticate::AUTH_METHOD_HEADER_TOKEN)
    {
        return (new ConfigFactory())->getNewConfigFacade($pVersion, $pAuthMethod);
    }

    public function getAPIFacade(ConfigInterface $pConfig)
    {
        return new APIFacade(
            $pConfig,
            $this,
            new InternalFactory()
        );
    }
}