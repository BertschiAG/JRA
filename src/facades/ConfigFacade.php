<?php

/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2015
 * User: jbaumann
 * File: ConfigFacade.php
 * Date: 23.12.2015
 * Time: 08:34
 */

namespace JRA\Facades;


use JRA\Config\ARSAnnatech;
use JRA\Config\Authenticate;

use JRA\Config\Server;
use JRA\Config\Version;
use JRA\Interfaces\ConfigInterface;

class ConfigFacade implements ConfigInterface
{
    /**
     * @var \JRA\Config\ARSAnnatech
     */
    private $_arsAnnatechConfig;

    /**
     * @var \JRA\Config\Authenticate
     */
    private $_authenticateConfig;

    /**
     * @var \JRA\Config\Server
     */
    private $_serverConfig;

    /**
     * @var \JRA\Config\Version
     */
    private $_versionConfig;

    /**
     * ConfigFacade constructor.
     * @param \JRA\Config\ARSAnnatech $pARSAnnatech
     * @param \JRA\Config\Authenticate $pAuthenticate
     * @param \JRA\Config\Server $pServer
     * @param \JRA\Config\Version $pVersion
     */
    public function __construct(ARSAnnatech $pARSAnnatech, Authenticate $pAuthenticate, Server $pServer, Version $pVersion)
    {
        $this->_arsAnnatechConfig = $pARSAnnatech;
        $this->_authenticateConfig = $pAuthenticate;
        $this->_serverConfig = $pServer;
        $this->_versionConfig = $pVersion;
    }

    public function setToken($pToken)
    {
        $this->_authenticateConfig->setToken($pToken);
    }

    public function setCredentials($pUsername, $pPassword)
    {
        $this->_authenticateConfig->setCredentials($pUsername, $pPassword);
    }

    public function getAuthenticationMethod()
    {
        return $this->_authenticateConfig->getAuthenticationMethod();
    }

    public function getAuthenticationCredentials()
    {
        return $this->_authenticateConfig->getAuthenticationCredentials();
    }

    public function setSession($pSession)
    {
        $this->_authenticateConfig->setSession($pSession);
    }

    public function getSession()
    {
        return $this->_authenticateConfig->getSession();
    }

    public function setUrl($pUrl)
    {
        $this->_serverConfig->setUrl($pUrl);
    }

    public function getRestAPIUrl()
    {
        return $this->_serverConfig->getRestAPIUrl();
    }

    public function isAutoLoginOn()
    {
        return $this->_authenticateConfig->isAutoLoginOn();
    }
}