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
     * True if an auto login should be performed, false otherwise
     *
     * @var boolean
     */
    private $_autoLogin;

    /**
     * These arguments contains the values for replacing the keys in the route.
     * It also contains addition arguments, which are over given in the request body.
     *
     * @var array
     */
    private $_additionalArguments;

    /**
     * The response of the web request (only the html)
     *
     * @var string
     */
    private $_response;

    /**
     * The words which should be replaced in the url
     *
     * @var string[]
     */
    protected $_keyWords;

    /**
     * The http method (options, get, head, post, put, delete)
     *
     * @var string
     */
    private $_httpMethod;

    /**
     * The configuration for the current JRA execution
     *
     * @var ConfigInterface
     */
    protected $_config;

    /**
     * The factory for internal use
     *
     * @var InternalFactory
     */
    protected $_factory;

    /**
     * The method which should be executed
     *
     * @var AbstractMethod
     */
    private $_method;

    /**
     * The route or URL for the current method
     *
     * @var string
     */
    private $_methodRoute;

    /**
     * The params which will be attached to the url
     *
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
     * Returns true if auto login is on, false otherwise.
     *
     * @return boolean
     */
    public function isAutoLogin()
    {
        return $this->_autoLogin;
    }

    /**
     * Sets the auto login to the specified value.
     *
     * @param boolean $pValue
     */
    protected function setAutoLogin($pValue)
    {
        $this->_autoLogin = $pValue;
    }

    /**
     * Get the additional arguments which are for replacing the keys in the routes.
     * It also contains additional arguments which will be sent with the request body.
     *
     * @return array
     */
    public function getAdditionalArguments()
    {
        return $this->_additionalArguments;
    }

    /**
     * Set the additional arguments which are for replacing the keys in the routes.
     * It also contains additional arguments which will be sent with the request body.
     *
     * @param array $pAdditionalArguments
     */
    public function setAdditionalArguments($pAdditionalArguments)
    {
        $this->_additionalArguments = $pAdditionalArguments;
    }

    /**
     * Get the response of the web request (only the html)
     *
     * @return string
     */
    public function getResponse()
    {
        return $this->_response;
    }

    /**
     * Set the response of the web request (only the html)
     *
     * @param string $pResponse
     */
    protected function setResponse($pResponse)
    {
        $this->_response = $pResponse;
    }

    /**
     * Processes the method and calls Guzzle for requesting the URL.
     */
    public function process()
    {
        $httpMethod = $this->getHttpMethod();
        $this->_response = $this->_factory
            ->getGuzzleFactory()
            ->getGuzzleHandler()
            ->$httpMethod(
                $this->getParsedUrl(),
                (($httpMethod === 'POST' || $httpMethod === 'PUT') ? $this->getAdditionalArguments() : null)
            )
            ->getBody(true);

    }

    /**
     * Checks the arguments, so that all necessary arguments are give.
     *
     * @return boolean Returns true if correct arguments are specified, false otherwise.
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
     * The methods need to check addition arguments by itself.
     *
     * @return boolean
     */
    abstract protected function _checkArguments();

    /**
     * Returns the parsed url (with keywords replaced and url params attached).
     *
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

        if (!empty($additionalArguments) && $this->getHttpMethod() !== 'POST' && $this->getHttpMethod() !== 'PUT') {
            $route .= '?';
            foreach ($additionalArguments as $pKey => $pValue) {
                $route .= urlencode($pKey) . '=' . urlencode($pValue) . '&';
            }
            $route = substr($route, 0, -1);
        }
        return $route;
    }

    /**
     * Returns the http method for the current method.
     *
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
     * Returns the current specified method.
     *
     * @return AbstractMethod
     */
    protected function _getMethod()
    {
        return $this->_method;
    }

    /**
     * Sets the current specified method.
     *
     * @param AbstractMethod $pMethod
     */
    protected function _setMethod($pMethod)
    {
        $this->_method = $pMethod;
    }

    /**
     * Returns the none parsed route.
     *
     * @return string
     */
    public function getMethodRoute()
    {
        return $this->_methodRoute;
    }

    /**
     * Sets the none parsed route.
     *
     * @param string $pMethodRoute
     */
    public function setMethodRoute($pMethodRoute)
    {
        $this->_methodRoute = $pMethodRoute;
    }

    /**
     * Get all url params.
     *
     * @return array
     */
    public function getUrlParams()
    {
        return $this->_urlParams;
    }

    /**
     * Set all url params.
     *
     * @param array $urlParams
     */
    public function setUrlParams($urlParams)
    {
        foreach ($urlParams as $pKey => $pValue) {
            $this->_urlParams[] = $pKey . '=' . urlencode($pValue);
        }
    }
}