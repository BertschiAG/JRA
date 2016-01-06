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
use JRA\Exceptions\UserCredentialsConfigException;
use JRA\Exceptions\TokenConfigException;

class Authenticate
{
    const AUTH_METHOD_HEADER_TOKEN = 100;
    const AUTH_METHOD_USER_CREDENTIALS = 101;
    const AUTH_METHOD_TOKEN = 102;

    const AUTH_AUTO_LOGIN_ON = 200;
    const AUTH_AUTO_LOGIN_OFF = 201;

    private $_token;

    private $_username;
    private $_password;
    private $_session;

    private $_authMethod;
    private $_autoLogin;

    public function __construct($pAuthMethod, $pAutoLogin)
    {
        $this->_authMethod = $pAuthMethod;
        $this->_autoLogin = $pAutoLogin;
    }

    public function setToken($pToken)
    {
        if ($this->_authMethod === Authenticate::AUTH_METHOD_HEADER_TOKEN || $this->_authMethod === Authenticate::AUTH_METHOD_TOKEN) {
            $this->_token = $pToken;
        } else {
            throw new TokenConfigException('Token authentication is not enabled.', TokenConfigException::TOKEN_CONFIG_EXCEPTION_NOT_ENABLED);
        }
    }

    public function setCredentials($pUsername, $pPassword)
    {
        if ($this->_authMethod === Authenticate::AUTH_METHOD_USER_CREDENTIALS) {
            $this->_username = $pUsername;
            $this->_password = $pPassword;
        } else {
            throw new UserCredentialsConfigException('User credentials authentication is not enabled.', UserCredentialsConfigException::USER_CREDENTIALS_CONFIG_EXCEPTION_NOT_ENABLED);
        }
    }

    public function getAuthenticationMethod()
    {
        return $this->_authMethod;
    }

    public function isAutoLoginOn()
    {
        return ($this->_autoLogin === Authenticate::AUTH_AUTO_LOGIN_ON) ? true : false;
    }

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

    public function setSession($pSession)
    {
        $this->_session = $pSession;
    }

    public function getSession()
    {
        return $this->_session;
    }
}