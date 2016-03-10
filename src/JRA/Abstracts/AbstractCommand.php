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
     *
     */
    public function process()
    {
        $httpMethod = $this->getHttpMethod();
        $this->_response = $this->_factory
            ->getGuzzleFactory()
            ->getGuzzleHandler()
            ->$httpMethod(
                $this->getParsedUrl(),
                (($httpMethod === 'POST') ? $this->getAdditionalArguments() : null)
            )
            ->getBody(true);

    }

    /**
     * @return boolean
     */
    public function checkArguments()
    {
        if (empty($this->getMethodRoute())) {
            return false;
        }
        preg_match_all('/[:](\w+)/', $this->getMethodRoute(), $matches);
        $this->_keyWords = $matches[1];
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
        $route = $this->getMethodRoute();
        $additionalArguments = $this->getAdditionalArguments();

        foreach ($this->_keyWords as $pValue) {
            $route = str_replace(':' . $pValue, urlencode($additionalArguments[$pValue]), $route);
            unset($additionalArguments[$pValue]);
        }

        if (!empty($additionalArguments) && $this->getHttpMethod() !== 'POST') {
            $route .= '?';
            foreach ($additionalArguments as $pKey => $pValue) {
                $route .= urlencode($pKey) . '=' . urlencode($pValue) . '&';
            }
            $route = substr($route, 0, -1);
        }
        return $route;
    }

    /**
     * @return string
     */
    public function getHttpMethod()
    {
        if (empty($this->_httpMethod)) {
            $className = get_class($this);
            preg_match('/\\\\([A-Z][a-z]*)\w*$/', $className, $match);
            $match = array_flip($match);
            $match = array_change_key_case($match, CASE_UPPER);
            $match = array_flip($match);
            $match = $match[1];
            $this->_httpMethod = $match;
        }
        return $this->_httpMethod;
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
     * @return string
     */
    public function getMethodRoute()
    {
        return $this->_methodRoute;
    }

    /**
     * @param string $pMethodRoute
     */
    public function setMethodRoute($pMethodRoute)
    {
        $this->_methodRoute = $pMethodRoute;
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