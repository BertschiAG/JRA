<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: CommandFactory.php
 * Date: 20.01.2016
 * Time: 14:04
 */

namespace JRA\Factories;


use JRA\Commands\ContentCommand;
use JRA\Commands\Invokers\CommandInvoker;
use JRA\Commands\TokenCommand;
use JRA\Commands\UserCommand;
use JRA\Interfaces\ConfigInterface;

class CommandFactory
{
    /**
     * @var InternalFactory
     */
    private $_internalFactory;

    /**
     * CommandFactory constructor.
     *
     * @param InternalFactory $pInternalFactory
     */
    public function __construct($pInternalFactory)
    {
        $this->_internalFactory = $pInternalFactory;
    }

    /**
     * @param ConfigInterface $pConfig
     * @return CommandInvoker
     */
    public function getContentCommand($pConfig)
    {
        $commandInvoker = new CommandInvoker();
        $commandInvoker->setCommand(new ContentCommand($pConfig, $this->_internalFactory));
        return $commandInvoker;
    }

    /**
     * @param ConfigInterface $pConfig
     * @return CommandInvoker
     */
    public function getTokenCommand($pConfig)
    {
        $commandInvoker = new CommandInvoker();
        $commandInvoker->setCommand(new TokenCommand($pConfig, $this->_internalFactory));
        return $commandInvoker;
    }

    /**
     * @param ConfigInterface $pConfig
     * @return CommandInvoker
     */
    public function getUserCommand($pConfig)
    {
        $commandInvoker = new CommandInvoker();
        $commandInvoker->setCommand(new UserCommand($pConfig, $this->_internalFactory));
        return $commandInvoker;
    }
}