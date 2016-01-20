<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: GuzzleMapper.php
 * Date: 05.01.2016
 * Time: 17:00
 */

namespace JRA\Mappers;


use JRA\Factories\GuzzleFactory;
use JRA\Interfaces\ConfigInterface;

class GuzzleMapper
{
    /**
     * @var ConfigInterface
     */
    private $_config;

    /**
     * @var \GuzzleHttp\Client
     */
    private $_guzzleClientObject;

    /**
     * GuzzleMapper constructor.
     * @param ConfigInterface $pConfig
     */
    public function __construct(ConfigInterface $pConfig)
    {
        $this->_config = $pConfig;
        $this->_guzzleClientObject = GuzzleFactory::getHttpClientObject();
    }

    /**
     * @param $pPath
     * @param string $pType
     * @param array $headers
     * @param array $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function guzzleRequest($pPath, $pType = 'GET', $headers = [], $options = [])
    {
        foreach ($headers as $pKey => $pValue) {
            $options['headers'][$pKey] = $pValue;
        }
        return
            $this->_guzzleClientObject->request(
                $pType,
                $this->_config->getRestAPIUrl() . $pPath,
                $options
            );
    }
}