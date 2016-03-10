<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2015
 * User: jbaumann
 * File: GuzzleFactory.php
 * Date: 24.12.2015
 * Time: 08:29
 */

namespace JRA\Factories;


use Guzzle\Http\Client;
use Guzzle\Plugin\Cookie\CookieJar\ArrayCookieJar;
use Guzzle\Plugin\Cookie\CookiePlugin;
use JRA\ComposerHandler\GuzzleHandler;
use JRA\Interfaces\ConfigInterface;

class GuzzleFactory
{
    /**
     * @var ConfigInterface
     */
    private $_config;

    /**
     * @var InternalFactory
     */
    private $_factory;

    /**
     * @var GuzzleHandler
     */
    private $_guzzleHandler;

    /**
     * @var Client
     */
    private $_client;

    /**
     * @var CookiePlugin
     */
    private $_cookiePlugin;

    /**
     * GuzzleFactory constructor.
     *
     * @param ConfigInterface $pConfig
     * @param InternalFactory $pFactory
     */
    public function __construct(ConfigInterface $pConfig, InternalFactory $pFactory)
    {
        $this->_config = $pConfig;
        $this->_factory = $pFactory;
    }

    /**
     * @return GuzzleHandler
     */
    public function getGuzzleHandler()
    {
        if (is_null($this->_guzzleHandler)) {
            $this->_guzzleHandler = new GuzzleHandler($this->_config, $this->_factory);
        }
        return $this->_guzzleHandler;
    }

    /**
     * @param array $pConfigurationOptions
     * @return Client
     */
    public function getHttpClientObject($pConfigurationOptions = array())
    {
        if (is_null($this->_client)) {
            $this->_client = new Client(($this->_config->getRestAPIUrl() === '') ?: $this->_config->getRestAPIUrl(), $pConfigurationOptions);
        }
        return $this->_client;
    }

    /**
     *
     */
    public function getArrayCookieJar()
    {
        die('asd');
    }

    /**
     * @param null $pArrayCookieJar
     * @return CookiePlugin
     */
    public function getCookiePlugin($pArrayCookieJar = null)
    {
        if (is_null($this->_cookiePlugin)) {
            $this->_cookiePlugin = new CookiePlugin(
                ($pArrayCookieJar === null) ? new ArrayCookieJar() : $pArrayCookieJar
            );
        }
        return $this->_cookiePlugin;
    }
}