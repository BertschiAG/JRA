<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: TokenLogin.php
 * Date: 06.01.2016
 * Time: 10:43
 */

namespace JRA\Responsibilities\Responsible\Login;


use JRA\Config\Authenticate;
use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;
use JRA\Responsibilities\Handlers\AbstractLoginHandler;
use stdClass;

class TokenLogin extends AbstractLoginHandler
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
        if ($pConfig->getAuthenticationMethod() !== Authenticate::AUTH_METHOD_TOKEN) {
            return false;
        }
        $token = $pConfig->getAuthenticationCredentials();
        return
            json_decode(
                $pInternalFactory
                    ->getGuzzleFactory()
                    ->getGuzzleHandler()
                    ->get(
                        'token/' . $token
                    )
                    ->getBody()
            );
    }
}