<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: CommandInvoker.php
 * Date: 11.01.2016
 * Time: 08:49
 */

namespace JRA\Commands\Invokers;


use JRA\Abstracts\AbstractCommand;

class CommandInvoker
{
    /**
     * @var AbstractCommand
     */
    protected $_command;

    /**
     * @var string
     */
    protected $_contents;

    /**
     * Subscribes the command
     *
     * @param AbstractCommand $pCommand
     */
    public function setCommand(AbstractCommand $pCommand)
    {
        $this->_command = $pCommand;
    }

    /**
     * Starts the processing of the command
     */
    public function run()
    {
        $this->_command->process();
        $this->_contents = $this->_command->getResponse();
    }

    /**
     * @return string
     */
    public function getContents()
    {
        return $this->_contents;
    }
}