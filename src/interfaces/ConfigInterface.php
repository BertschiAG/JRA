<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: ConfigInterface.php
 * Date: 04.01.2016
 * Time: 16:38
 */

namespace JRA\Interfaces;


use JRA\Config\ARSAnnatech;
use JRA\Config\Authenticate;
use JRA\Config\Server;
use JRA\Config\Version;

interface ConfigInterface
{
    public function __construct(ARSAnnatech $pARSAnnatech, Authenticate $pAuthenticate, Server $pServer, Version $pVersion);

    public function setToken($pToken);

    public function setCredentials($pUsername, $pPassword);

    public function getAuthenticationMethod();

    public function getAuthenticationCredentials();

    public function isAutoLoginOn();

    public function setUrl($pUrl);

    public function getRestAPIUrl();

    public function setSession($pSession);

    public function getSession();
}