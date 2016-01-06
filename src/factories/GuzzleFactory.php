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


use GuzzleHttp\Client;
use JRA\Interfaces\ConfigInterface;
use JRA\Mappers\GuzzleMapper;

class GuzzleFactory
{
    public static function getHttpClientObject()
    {
        return new Client();
    }

    public function getNewGuzzleMapper(ConfigInterface $pConfig)
    {
        return new GuzzleMapper($pConfig);
    }
}