<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: AbstractTestCase.php
 * Date: 09.03.2016
 * Time: 08:31
 */

namespace JRA\Library;


use JRA\Config\Authenticate;
use JRA\Config\Helper\Versions;
use JRA\Configuration;
use JRA\Facades\APIFacade;
use JRA\Facades\ConfigFacade;
use JRA\FrontFactory;

abstract class AbstractTestCase
{

    /**
     * @var FrontFactory
     */
    protected $_frontFactory;

    /**
     * @var ConfigFacade
     */
    protected $_config;

    /**
     * @var APIFacade
     */
    protected $_apiFacade;

    /**
     * AbstractTestCase constructor.
     */
    public function __construct()
    {
        $this->_frontFactory = new FrontFactory();
        $this->_config = $this->_frontFactory->getNewConfigObject(Versions::API_VERSION_LATEST, Authenticate::AUTH_METHOD_USER_CREDENTIALS);
        $this->_config->setCredentials(Configuration::USERNAME, Configuration::PASSWORD);
        $this->_config->setUrl(Configuration::URL);
        $this->_apiFacade = $this->_frontFactory->getAPIFacade($this->_config);
    }

    /**
     * @return boolean
     */
    abstract public function test();
}