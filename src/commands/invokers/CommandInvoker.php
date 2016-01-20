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
use JRA\Abstracts\AbstractMethod;

class CommandInvoker
{
    /**
     * @var AbstractCommand
     */
    protected $_command;

    /**
     * @var string
     */
    protected $_methodRoute;

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
     * @param string $pString
     */
    public function setMethodRoute($pString)
    {
        $this->_methodRoute = $pString;
    }

    /**
     * Starts the processing of the command
     */
    public function run()
    {
        $this->_command->setMethodRoute($this->_methodRoute);
        $this->_command->process();
    }

    /**
     * @return string
     */
    public function getContents()
    {
        return $this->_contents;
    }
}