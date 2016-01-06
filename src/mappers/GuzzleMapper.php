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
    private $_config;
    private $_guzzleClientObject;

    public function __construct(ConfigInterface $pConfig)
    {
        $this->_config = $pConfig;
        $this->_guzzleClientObject = GuzzleFactory::getHttpClientObject();
    }

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