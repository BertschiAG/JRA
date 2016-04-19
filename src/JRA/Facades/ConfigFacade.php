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
use JRA\Exceptions\AuthenticationConfigException;
use JRA\Exceptions\ServerConfigException;
use JRA\Exceptions\TokenConfigException;
use JRA\Exceptions\UserCredentialsConfigException;
use JRA\Interfaces\ConfigInterface;

class ConfigFacade implements ConfigInterface
{
    /**
     * The config for all ars requests.
     *
     * @var ARSAnnatech
     */
    private $_arsAnnatechConfig;

    /**
     * The config for authenticate against the cAPI.
     *
     * @var Authenticate
     */
    private $_authenticateConfig;

    /**
     * The config which provides the server configuration for requesting.
     *
     * @var Server
     */
    private $_serverConfig;

    /**
     * The config which contains the version information of the cAPI.
     *
     * @var Version
     */
    private $_versionConfig;

    /**
     * ConfigFacade constructor.
     *
     * @param ARSAnnatech $pARSAnnatech The config for all ars requests.
     * @param Authenticate $pAuthenticate The config for authenticate against the cAPI.
     * @param Server $pServer The config which provides the server configuration for requesting.
     * @param Version $pVersion The config which contains the version information of the cAPI.
     */
    public function __construct(ARSAnnatech $pARSAnnatech, Authenticate $pAuthenticate, Server $pServer, Version $pVersion)
    {
        $this->_arsAnnatechConfig = $pARSAnnatech;
        $this->_authenticateConfig = $pAuthenticate;
        $this->_serverConfig = $pServer;
        $this->_versionConfig = $pVersion;
    }

    /**
     * Sets the token for authentication.
     *
     * @param string $pToken The token which should be set.
     * @throws TokenConfigException Throws an exception if something went wrong.
     */
    public function setToken($pToken)
    {
        $this->_authenticateConfig->setToken($pToken);
    }

    /**
     * Sets the user credentials for authentication.
     *
     * @param string $pUsername The username which should be set.
     * @param string $pPassword The password which should be set.
     * @throws UserCredentialsConfigException Throws an exception if something went wrong.
     */
    public function setCredentials($pUsername, $pPassword)
    {
        $this->_authenticateConfig->setCredentials($pUsername, $pPassword);
    }

    /**
     * Returns the authentication method.
     *
     * @return int The id of the authentication method.
     */
    public function getAuthenticationMethod()
    {
        return $this->_authenticateConfig->getAuthenticationMethod();
    }

    /**
     * Return the authentication credentials for the selected authentication method.
     *
     * @return array|string Returns an array with the user credentials or returns an string with the token.
     * @throws TokenConfigException Throws this exception if something went wrong with token returning.
     * @throws UserCredentialsConfigException Throws this exception if something went wrong with user credentials returning.
     * @throws AuthenticationConfigException Throws this exception if something went wrong with the authentication config itself.
     */
    public function getAuthenticationCredentials()
    {
        return $this->_authenticateConfig->getAuthenticationCredentials();
    }

    /**
     * Sets the session id of the current logged in session.
     *
     * @param string $pSession The session which should be stored.
     */
    public function setSession($pSession)
    {
        $this->_authenticateConfig->setSession($pSession);
    }

    /**
     * Return the session id.
     *
     * @return string The session id of the current logged in session.
     */
    public function getSession()
    {
        return $this->_authenticateConfig->getSession();
    }

    /**
     * Sets the url which should be used for requesting the cAPI.
     *
     * @param string $pUrl The url which should be set.
     * @throws ServerConfigException Throws an exception if the url is invalid.
     */
    public function setUrl($pUrl)
    {
        $this->_serverConfig->setUrl($pUrl);
    }

    /**
     * Returns the optimized requesting url.
     *
     * @return string The optimized requesting url.
     * @throws ServerConfigException Throws an exception if something went wrong on returning.
     */
    public function getRestAPIUrl()
    {
        return $this->_serverConfig->getRestAPIUrl();
    }

    /**
     * Checks if auto login is either on or off.
     *
     * @return bool Returns true if auto login if on, false otherwise.
     */
    public function isAutoLoginOn()
    {
        return $this->_authenticateConfig->isAutoLoginOn();
    }
}