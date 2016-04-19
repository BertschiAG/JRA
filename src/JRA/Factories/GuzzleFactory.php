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
     * The configuration for the current requests.
     *
     * @var ConfigInterface
     */
    private $_config;

    /**
     * The factory which is used for internal object creation.
     *
     * @var InternalFactory
     */
    private $_factory;

    /**
     * The handler which routes the request to the HttpHandler.
     *
     * @var GuzzleHandler
     */
    private $_guzzleHandler;

    /**
     * The client which is used for requests.
     *
     * @var Client
     */
    private $_client;

    /**
     * The cookie plugin which is used to store cookies and use them in the next request.
     *
     * @var CookiePlugin
     */
    private $_cookiePlugin;

    /**
     * GuzzleFactory constructor.
     *
     * @param ConfigInterface $pConfig The configuration for the current requests.
     * @param InternalFactory $pFactory The factory which is used for internal object creation.
     */
    public function __construct(ConfigInterface $pConfig, InternalFactory $pFactory)
    {
        $this->_config = $pConfig;
        $this->_factory = $pFactory;
    }

    /**
     * Creates the GuzzleHandler if not done before.
     *
     * @return GuzzleHandler Returns the GuzzleHandler object.
     */
    public function getGuzzleHandler()
    {
        if (is_null($this->_guzzleHandler)) {
            $this->_guzzleHandler = new GuzzleHandler($this->_config, $this->_factory);
        }
        return $this->_guzzleHandler;
    }

    /**
     * Creates the Client object if not done before.
     *
     * @param array $pConfigurationOptions The configuration which is used to create a correct client object.
     * @return Client Returns the Client object.
     */
    public function getHttpClientObject($pConfigurationOptions = array())
    {
        if (is_null($this->_client)) {
            $this->_client = new Client(($this->_config->getRestAPIUrl() === '') ?: $this->_config->getRestAPIUrl(), $pConfigurationOptions);
        }
        return $this->_client;
    }

    /**
     * Creates a CookiePlugin for the guzzle if not done before.
     *
     * @param null $pArrayCookieJar The cookies which should be set.
     * @return CookiePlugin Returns the CookiePlugin object.
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