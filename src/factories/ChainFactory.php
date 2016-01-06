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


use JRA\Responsibilities\Responsible\HeaderTokenLogin;
use JRA\Responsibilities\Responsible\TokenLogin;
use JRA\Responsibilities\Responsible\UserCredentialsLogin;

class ChainFactory
{
    public function getLoginChain()
    {
        $chain = new HeaderTokenLogin();
        $chain->append(new TokenLogin());
        $chain->append(new UserCredentialsLogin());
        return $chain;
    }
}