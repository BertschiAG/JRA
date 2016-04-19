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
     * The chain factory for login and logout.
     *
     * @var ChainFactory
     */
    private $_chainFactory;

    /**
     * The factory which is considered to guzzle object creation.
     *
     * @var GuzzleFactory
     */
    private $_guzzleFactory;

    /**
     * The command factory which creates the requested method.
     *
     * @var CommandFactory
     */
    private $_commandFactory;

    /**
     * InternalFactory constructor.
     *
     * @param ConfigInterface $pConfig The configuration of the Request.
     */
    public function __construct(ConfigInterface $pConfig)
    {
        $this->_chainFactory = new ChainFactory();
        $this->_guzzleFactory = new GuzzleFactory($pConfig, $this);
        $this->_commandFactory = new CommandFactory($this);
    }

    /**
     * Returns the chain factory.
     *
     * @return ChainFactory
     */
    public function getChainFactory()
    {
        return $this->_chainFactory;
    }

    /**
     * Returns the guzzle factory.
     *
     * @return GuzzleFactory
     */
    public function getGuzzleFactory()
    {
        return $this->_guzzleFactory;
    }

    /**
     * Returns the command factory.
     *
     * @return CommandFactory
     */
    public function getCommandFactory()
    {
        return $this->_commandFactory;
    }
}