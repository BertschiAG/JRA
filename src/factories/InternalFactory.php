<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: InternalFactory.php
 * Date: 06.01.2016
 * Time: 11:43
 */

namespace JRA\Factories;


class InternalFactory
{
    private $_chainFactory;
    private $_guzzleFactory;

    public function __construct()
    {
        $this->_chainFactory = new ChainFactory();
        $this->_guzzleFactory = new GuzzleFactory();
    }

    /**
     * @return ChainFactory
     */
    public function getChainFactory()
    {
        return $this->_chainFactory;
    }

    /**
     * @return GuzzleFactory
     */
    public function getGuzzleFactory()
    {
        return $this->_guzzleFactory;
    }
}