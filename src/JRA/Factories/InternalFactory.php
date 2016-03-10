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


use JRA\Interfaces\ConfigInterface;

class InternalFactory
{

    /**
     * @var ChainFactory
     */
    private $_chainFactory;

    /**
     * @var GuzzleFactory
     */
    private $_guzzleFactory;

    /**
     * @var CommandFactory
     */
    private $_commandFactory;

    /**
     * InternalFactory constructor.
     *
     * @param ConfigInterface $pConfig
     */
    public function __construct(ConfigInterface $pConfig)
    {
        $this->_chainFactory = new ChainFactory();
        $this->_guzzleFactory = new GuzzleFactory($pConfig, $this);
        $this->_commandFactory = new CommandFactory($this);
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

    /**
     * @return CommandFactory
     */
    public function getCommandFactory()
    {
        return $this->_commandFactory;
    }
}