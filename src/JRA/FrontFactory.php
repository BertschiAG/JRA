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
use JRA\Config\Helper\Versions;
use JRA\Facades\APIFacade;
use JRA\Facades\ConfigFacade;
use JRA\Factories\ConfigFactory;
use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;


class FrontFactory
{

    /**
     * Returns a new config object.
     *
     * @param int $pVersion The version of cAPI which should be used.
     * @param int $pAuthMethod The authentication method which should be used.
     * @return ConfigFacade The config facade which routes the function to it's sub objects.
     */
    public function getNewConfigObject($pVersion = Versions::API_VERSION_LATEST, $pAuthMethod = Authenticate::AUTH_METHOD_HEADER_TOKEN)
    {
        return (new ConfigFactory())->getNewConfigFacade($pVersion, $pAuthMethod);
    }

    /**
     * Return a new api facade object.
     *
     * @param ConfigInterface $pConfig The configuration which is used to make the request.
     * @return APIFacade The APIFacade which provides all available operations.
     */
    public function getAPIFacade(ConfigInterface $pConfig)
    {
        return new APIFacade(
            $pConfig,
            new InternalFactory($pConfig)
        );
    }
}