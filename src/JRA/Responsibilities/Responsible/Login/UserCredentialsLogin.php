<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: UserCredentialsLogin.php
 * Date: 06.01.2016
 * Time: 10:44
 */

namespace JRA\Responsibilities\Responsible\Login;


use JRA\Config\Authenticate;
use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;
use JRA\Responsibilities\Handlers\AbstractLoginHandler;
use stdClass;

class UserCredentialsLogin extends AbstractLoginHandler
{

    /**
     * @param ConfigInterface $pConfig
     * @param InternalFactory $pInternalFactory
     * @return bool|stdClass true if the request has been processed, false otherwise
     */
    protected function process(ConfigInterface $pConfig, InternalFactory $pInternalFactory)
    {
        if ($pConfig->getAuthenticationMethod() !== Authenticate::AUTH_METHOD_USER_CREDENTIALS) {
            return false;
        }
        $userCredentials = $pConfig->getAuthenticationCredentials();
        $response = json_decode(
            $pInternalFactory
                ->getGuzzleFactory()
                ->getGuzzleHandler()
                ->get(
                    'user/login/' . $userCredentials['username'] . '/' . $userCredentials['password']
                )
                ->getBody()
        );
        if (!empty($session = $response->session)) {
            $pConfig->setSession($session);
        }
        return $response;

    }
}