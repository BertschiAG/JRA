<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: ChainFactory.php
 * Date: 06.01.2016
 * Time: 11:26
 */

namespace JRA\Factories;


use JRA\Responsibilities\Responsible\Login\HeaderTokenLogin;
use JRA\Responsibilities\Responsible\Login\TokenLogin;
use JRA\Responsibilities\Responsible\Login\UserCredentialsLogin;
use JRA\Responsibilities\Responsible\Logout\TokenLogout;
use JRA\Responsibilities\Responsible\Logout\UserCredentialsLogout;

class ChainFactory
{

    /**
     * Creates the login chain with all authentication possibilities.
     *
     * @return HeaderTokenLogin The first object of the chain.
     */
    public function getLoginChain()
    {
        $chain = new HeaderTokenLogin();
        $chain->append(new TokenLogin());
        $chain->append(new UserCredentialsLogin());
        return $chain;
    }

    /**
     * Creates the login chain with all authentication possibilities.
     *
     * @return TokenLogout The first object of the logout chain.
     */
    public function getLogoutChain()
    {
        $chain = new TokenLogout();
        $chain->append(new UserCredentialsLogout());
        return $chain;
    }
}