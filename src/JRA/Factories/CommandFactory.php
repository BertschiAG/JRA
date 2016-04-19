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
     * The factory which is used to create the internal objects.
     *
     * @var InternalFactory
     */
    private $_internalFactory;

    /**
     * CommandFactory constructor.
     *
     * @param InternalFactory $pInternalFactory The factory which is used to create the internal objects.
     */
    public function __construct($pInternalFactory)
    {
        $this->_internalFactory = $pInternalFactory;
    }

    /**
     * Returns a new command invoker with a content command configured.
     *
     * @param ConfigInterface $pConfig The configuration for the creation of the command invoker.
     * @param string $pMethodRoute The requested method route.
     * @param array $pAdditionalArguments Additional arguments which the command needs.
     * @return CommandInvoker Returns the created and configured command invoker.
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
     * Returns a new command invoker with a token command configured.
     *
     * @param ConfigInterface $pConfig The configuration for the creation of the command invoker.
     * @param string $pMethodRoute The requested method route.
     * @param array $pAdditionalArguments Additional arguments which the command needs.
     * @return CommandInvoker Returns the created and configured command invoker.
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
     * Returns a new command invoker with an user command configured.
     *
     * @param ConfigInterface $pConfig The configuration for the creation of the command invoker.
     * @param string $pMethodRoute The requested method route.
     * @param array $pAdditionalArguments Additional arguments which the command needs.
     * @return CommandInvoker Returns the created and configured command invoker.
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