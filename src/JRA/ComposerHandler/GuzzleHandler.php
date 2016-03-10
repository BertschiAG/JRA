<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: GuzzleHandler.php
 * Date: 03.02.2016
 * Time: 08:32
 */

namespace JRA\ComposerHandler;


use Guzzle\Http\Client;
use JRA\Config\Authenticate;
use JRA\Facades\ConfigFacade;
use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;

class GuzzleHandler
{
    /**
     * @var ConfigFacade
     */
    private $_config;

    /**
     * @var InternalFactory
     */
    private $_factory;

    /**
     * @var Client
     */
    private $_client;

    /**
     * GuzzleHandler constructor.
     *
     * @param ConfigFacade|ConfigInterface $pConfig
     * @param InternalFactory $pFactory
     */
    public function __construct(ConfigInterface $pConfig, InternalFactory $pFactory)
    {
        $this->_config = $pConfig;
        $this->_factory = $pFactory;
        $this->_client = $this->_factory->getGuzzleFactory()->getHttpClientObject($this->_configurationOptions());
        $this->_client->addSubscriber($this->_factory->getGuzzleFactory()->getCookiePlugin());
    }

    /**
     * @param string $pPath
     * @return \Guzzle\Http\Message\Response
     */
    public function get($pPath)
    {
        $request = $this->_client->get($pPath);
        $response = $request->send();
        return $response;
    }

    /**
     * @param string $pPath
     * @return \Guzzle\Http\Message\Response
     */
    public function put($pPath)
    {
        $request = $this->_client->put($pPath);
        $response = $request->send();
        return $response;
    }

    /**
     * @param string $pPath
     * @return \Guzzle\Http\Message\Response
     */
    public function delete($pPath)
    {
        $request = $this->_client->delete($pPath);
        $response = $request->send();
        return $response;
    }

    /**
     * @param string $pPath
     * @param array $pData
     * @return \Guzzle\Http\Message\Response
     */
    public function post($pPath, $pData)
    {
        $request = $this->_client->post($pPath, null, $pData);
        $response = $request->send();
        return $response;
    }

    private function _configurationOptions()
    {
        $response = array();
        if ($this->_config->getAuthenticationMethod() === Authenticate::AUTH_METHOD_HEADER_TOKEN) {
            $response['request.options']['headers']['token'] = $this->_config->getAuthenticationCredentials();
        }
        return $response;
    }
}