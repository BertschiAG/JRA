<?php

/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2015
 * User: jbaumann
 * File: Authenticate.php
 * Date: 23.12.2015
 * Time: 08:40
 */

namespace JRA\Config;


use JRA\Exceptions\AuthenticationConfigException;
use JRA\Exceptions\TokenConfigException;
use JRA\Exceptions\UserCredentialsConfigException;

class Authenticate
{

    /**
     * The auth method id for header token authentication.
     */
    const AUTH_METHOD_HEADER_TOKEN = 100;

    /**
     * The auth method id for user credentials authentication.
     */
    const AUTH_METHOD_USER_CREDENTIALS = 101;

    /**
     * The auth method if for token authentication.
     */
    const AUTH_METHOD_TOKEN = 102;

    /**
     * The auto login id if the api should automatically login.
     */
    const AUTH_AUTO_LOGIN_ON = 200;

    /**
     * The auto login id if the api should not automatically login.
     */
    const AUTH_AUTO_LOGIN_OFF = 201;

    /**
     * The token which should be used for header token authentication or session token authentication.
     *
     * @var string
     */
    private $_token;

    /**
     * The username which should be used for credentials authentication.
     *
     * @var string
     */
    private $_username;

    /**
     * The password which should be used for credentials authentication.
     *
     * @var string
     */
    private $_password;

    /**
     * The return session from the cAPI.
     *
     * @var string
     */
    private $_session;

    /**
     * The id of the chosen authentication option.
     *
     * @var int
     */
    private $_authMethod;

    /**
     * The id if the auto login is turned on or turned off.
     *
     * @var int
     */
    private $_autoLogin;


    /**
     * Authenticate constructor.
     *
     * @param int $pAuthMethod
     * @param int $pAutoLogin
     */
    public function __construct($pAuthMethod, $pAutoLogin)
    {
        $this->_authMethod = $pAuthMethod;
        $this->_autoLogin = $pAutoLogin;
    }

    /**
     * Sets the token for an token required authentication method.
     *
     * @param string $pToken The token which should be set.
     * @throws TokenConfigException If the authentication method is not set to an token required authentication method an exception will be thrown.
     */
    public function setToken($pToken)
    {
        if ($this->_authMethod === Authenticate::AUTH_METHOD_HEADER_TOKEN || $this->_authMethod === Authenticate::AUTH_METHOD_TOKEN) {
            $this->_token = $pToken;
        } else {
            throw new TokenConfigException('Token authentication is not enabled.', TokenConfigException::TOKEN_CONFIG_EXCEPTION_NOT_ENABLED);
        }
    }

    /**
     * Sets the user credentials for an user credentials required authentication method.
     *
     * @param string $pUsername The username which should be used for authentication.
     * @param string $pPassword The password which should be used for authentication.
     * @throws UserCredentialsConfigException If the authentication method is not set to an user credentials required authentication method an exception will be thrown.
     */
    public function setCredentials($pUsername, $pPassword)
    {
        if ($this->_authMethod === Authenticate::AUTH_METHOD_USER_CREDENTIALS) {
            $this->_username = $pUsername;
            $this->_password = $pPassword;
        } else {
            throw new UserCredentialsConfigException('User credentials authentication is not enabled.', UserCredentialsConfigException::USER_CREDENTIALS_CONFIG_EXCEPTION_NOT_ENABLED);
        }
    }

    /**
     * Returns the specified authentication method.
     *
     * @return int The authentication method.
     */
    public function getAuthenticationMethod()
    {
        return $this->_authMethod;
    }

    /**
     * Checks if auto login is on or off.
     *
     * @return bool True if auto login is on, false otherwise.
     */
    public function isAutoLoginOn()
    {
        return ($this->_autoLogin === Authenticate::AUTH_AUTO_LOGIN_ON) ? true : false;
    }

    /**
     * Returns the authentication credentials, based on the specified authentication method and if they are set before.
     *
     * @return array|string The user credentials or the token.
     * @throws AuthenticationConfigException Throws an exception if the authentication method is not set.
     * @throws TokenConfigException Throws an exception if the token is not specified and a token required authentication method is specified.
     * @throws UserCredentialsConfigException Throws an exception if the user credentials are not specified and a user credentials required authentication method is specified.
     */
    public function getAuthenticationCredentials()
    {
        if ($this->_authMethod === Authenticate::AUTH_METHOD_USER_CREDENTIALS) {
            if ($this->_username === null && $this->_password === null) {
                throw new UserCredentialsConfigException('User credentials not set.', UserCredentialsConfigException::USER_CREDENTIALS_CONFIG_EXCEPTION_USER_CREDENTIALS_NOT_SET);
            } else {
                return [
                    'username' => $this->_username,
                    'password' => $this->_password
                ];
            }
        } elseif ($this->_authMethod === Authenticate::AUTH_METHOD_TOKEN) {
            if ($this->_token === null) {
                throw new TokenConfigException('Token is not set for session token authentication.', TokenConfigException::TOKEN_CONFIG_EXCEPTION_TOKEN_NOT_SET);
            } else {
                return $this->_token;
            }
        } elseif ($this->_authMethod === Authenticate::AUTH_METHOD_HEADER_TOKEN) {
            if ($this->_token === null) {
                throw new TokenConfigException('Token is not set for header token authentication', TokenConfigException::TOKEN_CONFIG_EXCEPTION_TOKEN_NOT_SET);
            } else {
                return $this->_token;
            }
        } else {
            throw new AuthenticationConfigException('Authentication method not set.', AuthenticationConfigException::AUTHENTICATION_CONFIG_EXCEPTION_METHOD_NOT_SET);
        }
    }

    /**
     * Sets the current session of the Joomla.
     *
     * @param string $pSession
     */
    public function setSession($pSession)
    {
        $this->_session = $pSession;
    }


    /**
     * Returns the current session of the Joomla.
     *
     * @return string
     */
    public function getSession()
    {
        return $this->_session;
    }
}