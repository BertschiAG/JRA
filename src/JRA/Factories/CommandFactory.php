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
     * @param $pMethodRoute
     * @param array $pAdditionalArguments
     * @return CommandInvoker
     */
    public function getContentCommand($pConfig, $pMethodRoute, $pAdditionalArguments = [])
    {
        $command = new ContentCommand($pConfig, $this->_internalFactory);
        $command->setMethodRoute($pMethodRoute);
        $command->setAdditionalArguments($pAdditionalArguments);

        $commandInvoker = new CommandInvoker();
        $commandInvoker->setCommand($command);
        return $commandInvoker;
    }

    /**
     * @param ConfigInterface $pConfig
     * @param $pMethodRoute
     * @param array $pAdditionalArguments
     * @return CommandInvoker
     */
    public function getTokenCommand($pConfig, $pMethodRoute, $pAdditionalArguments = [])
    {
        $command = new TokenCommand($pConfig, $this->_internalFactory);
        $command->setMethodRoute($pMethodRoute);
        $command->setAdditionalArguments($pAdditionalArguments);

        $commandInvoker = new CommandInvoker();
        $commandInvoker->setCommand($command);
        return $commandInvoker;
    }

    /**
     * @param ConfigInterface $pConfig
     * @param string $pMethodRoute
     * @param array $pAdditionalArguments
     * @return CommandInvoker
     */
    public function getUserCommand($pConfig, $pMethodRoute, $pAdditionalArguments = [])
    {
        $command = new UserCommand($pConfig, $this->_internalFactory);
        $command->setMethodRoute($pMethodRoute);
        $command->setAdditionalArguments($pAdditionalArguments);

        $commandInvoker = new CommandInvoker();
        $commandInvoker->setCommand($command);
        return $commandInvoker;
    }
}