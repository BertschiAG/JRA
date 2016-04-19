<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: UserCredentialsLogout.php
 * Date: 27.01.2016
 * Time: 14:34
 */

namespace JRA\Responsibilities\Responsible\Logout;


use JRA\Config\Authenticate;
use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;
use JRA\Responsibilities\Handlers\AbstractLogoutHandler;
use stdClass;

class UserCredentialsLogout extends AbstractLogoutHandler
{

    /**
     * Each chain needs to fill this function with it's own actions.
     * This function contains the functionality of each chain.
     *
     * @param ConfigInterface $pConfig The configuration which is used to make the request.
     * @param InternalFactory $pInternalFactory The factory which is responsible for the internal object creation.
     * @return bool|stdClass true if the request has been processed, false otherwise
     */
    protected function process(ConfigInterface $pConfig, InternalFactory $pInternalFactory)
    {
        if ($pConfig->getAuthenticationMethod() !== Authenticate::AUTH_METHOD_USER_CREDENTIALS) {
            return false;
        }
        $userCredentials = $pConfig->getAuthenticationCredentials();
        $userSession = $pConfig->getSession();
        $response = json_decode(
            $pInternalFactory
                ->getGuzzleFactory()
                ->getGuzzleHandler()
                ->get(
                    'user/logout/' . $userCredentials['username'] . '/' . $userSession
                )
                ->getBody()
        );
        return $response;
    }
}