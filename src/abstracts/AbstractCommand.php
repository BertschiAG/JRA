<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: AbstractCommand.php
 * Date: 18.01.2016
 * Time: 08:59
 */

namespace JRA\Abstracts;


use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;

abstract class AbstractCommand
{
    /**
     * @var boolean
     */
    private $_autoLogin;

    /**
     * @var string
     */
    private $_route;

    /**
     * @var array
     */
    private $_additionalArguments;

    /**
     * @var string
     */
    private $_response;

    /**
     * @var string[]
     */
    protected $_keyWords;

    /**
     * @var string
     */
    private $_httpMethod;

    /**
     * @var ConfigInterface
     */
    protected $_config;

    /**
     * @var InternalFactory
     */
    protected $_factory;

    /**
     * @var AbstractMethod
     */
    private $_method;

    /**
     * @var string
     */
    private $_methodRoute;

    /**
     * @var array
     */
    private $_urlParams;

    /**
     * AbstractCommand constructor.
     *
     * @param ConfigInterface $pConfig
     * @param InternalFactory $pInternalFactory
     */
    public function __construct(ConfigInterface $pConfig, InternalFactory $pInternalFactory)
    {
        $this->_config = $pConfig;
        $this->_factory = $pInternalFactory;
    }

    /**
     * @return boolean
     */
    public function isAutoLogin()
    {
        return $this->_autoLogin;
    }

    /**
     * @param boolean $pValue
     */
    protected function setAutoLogin($pValue)
    {
        $this->_autoLogin = $pValue;
    }

    /**
     * @return array
     */
    public function getAdditionalArguments()
    {
        return $this->_additionalArguments;
    }

    /**
     * @param array $pAdditionalArguments
     */
    public function setAdditionalArguments($pAdditionalArguments)
    {
        $this->_additionalArguments = $pAdditionalArguments;
    }

    /**
     * @return string
     */
    public function getResponse()
    {
        return $this->_response;
    }

    /**
     * @param string $pResponse
     */
    protected function setResponse($pResponse)
    {
        $this->_response = $pResponse;
    }

    /**
     * @return void
     */
    public function process()
    {
        $this->_factory
            ->getGuzzleFactory()
            ->getNewGuzzleMapper($this->_config)
            ->guzzleRequest(
                $this->getParsedUrl(),
                $this->getHttpMethod()
            )
            ->getBody()
            ->getContents();
    }

    /**
     * @return boolean
     */
    public function checkArguments()
    {
        if (empty($this->_route)) {
            return false;
        }
        preg_match('/[:](\w+)/g', $this->_route, $this->_keyWords);
        foreach ($this->_keyWords as $pValue) {
            if (empty($this->_additionalArguments[$pValue])) {
                return false;
            }
        }
        if ($this->_checkArguments()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return boolean
     */
    abstract protected function _checkArguments();

    /**
     * @return string
     */
    public function getParsedUrl()
    {
        $route = $this->getRoute();
        $urlParams = $this->getUrlParams();

        foreach ($this->_keyWords as $pValue) {
            $route = str_replace(':' . $pValue, $this->getAdditionalArguments()[$pValue], $route);
        }

        if (!empty($urlParams)) {
            $urlParams = implode('&', $urlParams);
            $route .= '?' . $urlParams;
        }

        return $route;
    }

    /**
     * @return string
     */
    public function getHttpMethod()
    {
        if (empty($this->_httpMethod)) {
            $class = __CLASS__;
            preg_match('/([A-Z][a-z]*)/', $class, $match);
            $match = array_flip($match);
            $match = array_change_key_case($match, CASE_UPPER);
            $match = array_flip($match);
            $match = $match[1];
            $this->_httpMethod = $match;
        }
        return $this->_httpMethod;
    }

    public function getRoute()
    {
        if (empty($this->_route)) {
            $class = __CLASS__;
            preg_match_all('/([A-Z][a-z]*)/', $class, $matches);
            $matches = array_flip($matches[0]);
            $matches = array_change_key_case($matches, CASE_UPPER);
            $matches = array_flip($matches);
            $constName = implode('_', $matches);

            $namespace = __NAMESPACE__;
            $namespace = explode('\\', $namespace);
            $this->_route = constant('JRA\Commands\Routes\\' . end($namespace) . 'Routes::' . $constName);
        }
        return $this->_route;
    }

    /**
     * @return AbstractMethod
     */
    protected function _getMethod()
    {
        return $this->_method;
    }

    /**
     * @param AbstractMethod $pMethod
     */
    protected function _setMethod($pMethod)
    {
        $this->_method = $pMethod;
    }

    /**
     * @param string $pRoute
     */
    public function setMethodRoute($pRoute)
    {
        $this->_methodRoute = $pRoute;
    }

    /**
     * @return string
     */
    public function getMethodRoute()
    {
        return $this->_methodRoute;
    }

    /**
     * @return array
     */
    public function getUrlParams()
    {
        return $this->_urlParams;
    }

    /**
     * @param array $urlParams
     */
    public function setUrlParams($urlParams)
    {
        foreach ($urlParams as $pKey => $pValue) {
            $this->_urlParams[] = $pKey . '=' . urlencode($pValue);
        }
    }
}