<?php

/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2015
 * User: jbaumann
 * File: Server.php
 * Date: 23.12.2015
 * Time: 08:39
 */

namespace JRA\Config;


use JRA\Exceptions\ServerConfigException;
use ReflectionClass;

class Server
{
    private $_restAPIUrl;
    private $_version;

    private $_scheme;
    private $_host;
    private $_port;
    private $_user;
    private $_pass;
    private $_path;
    private $_query;
    private $_fragment;

    public function __construct($pVersion)
    {
        $this->_version = $pVersion;
    }

    public function setUrl($pUrl)
    {
        if ($this->_restAPIUrl === null) {
            $this->_defineUrlComponents($pUrl);
            $this->_validateUrlComponents();
            $this->_generateRestAPIUrl();
        } else {
            throw new ServerConfigException('Url is already defined.', ServerConfigException::SERVER_CONFIG_EXCEPTION_ALREADY_DEFINED);
        }
    }

    private function _defineUrlComponents($pUrl)
    {
        $parsedUrl = parse_url($pUrl);
        if ($parsedUrl) {
            $this->_scheme = (isset($parsedUrl['scheme'])) ? $parsedUrl['scheme'] : null;
            $this->_host = (isset($parsedUrl['host'])) ? $parsedUrl['host'] : null;
            $this->_port = (isset($parsedUrl['port'])) ? $parsedUrl['port'] : null;
            $this->_user = (isset($parsedUrl['user'])) ? $parsedUrl['user'] : null;
            $this->_pass = (isset($parsedUrl['pass'])) ? $parsedUrl['pass'] : null;
            $this->_path = (isset($parsedUrl['path'])) ? $parsedUrl['path'] : null;
            $this->_query = (isset($parsedUrl['query'])) ? $parsedUrl['query'] : null;
            $this->_fragment = (isset($parsedUrl['fragment'])) ? $parsedUrl['fragment'] : null;
        } else {
            throw new ServerConfigException('Url is not valid.', ServerConfigException::SERVER_CONFIG_EXCEPTION_URL_NOT_VALID);
        }
    }

    private function _validateUrlComponents()
    {
        if (empty($this->_scheme)) {
            $this->_scheme = 'http';
        }
        if (empty($this->_host)) {
            throw new ServerConfigException('Host is not valid.', ServerConfigException::SERVER_CONFIG_EXCEPTION_HOST_NOT_VALID);
        }
        if (empty($this->_port) || $this->_port === 80) {
            $this->_port = null;
        }
        if (empty($this->_user) || empty($this->_pass)) {
            $this->_user = null;
            $this->_pass = null;
        }
        if (array_search($this->_path . '/', (new ReflectionClass('JRA\Config\Helper\APIRoutes'))->getConstants())) {
            $this->_path = null;
        }
    }

    private function _generateRestAPIUrl()
    {
        $url = '';
        $url .= $this->_scheme . '://';
        if ($this->_user !== null && $this->_pass !== null) {
            $url .= $this->_user . ':' . $this->_pass . '@';
        }
        $url .= $this->_host;
        if ($this->_port !== null) {
            $url .= ':' . $this->_port;
        }
        if ($this->_path !== null) {
            $url .= $this->_path;
            if (substr($this->_path, -1) !== '/') {
                $url .= '/';
            }
        } else {
            $url .= '/';
        }
        if ($versionKey = array_search($this->_version, (new ReflectionClass('JRA\Config\Helper\Versions'))->getConstants())) {
            $url .= (new ReflectionClass('JRA\Config\Helper\APIRoutes'))->getConstants()[$versionKey];
        }
        $this->_restAPIUrl = $url;
    }

    public function getRestAPIUrl()
    {
        if ($this->_restAPIUrl === null) {
            throw new ServerConfigException('Url is undefined.', ServerConfigException::SERVER_CONFIG_EXCEPTION_URL_UNDEFINED);
        } else {
            return $this->_restAPIUrl;
        }
    }
}