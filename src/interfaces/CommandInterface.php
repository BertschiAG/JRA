<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: CommandInterface.php
 * Date: 11.01.2016
 * Time: 08:45
 */

namespace JRA\Interfaces;


use JRA\Abstracts\AbstractResponseReceiver;
use JRA\Factories\InternalFactory;

interface CommandInterface
{

    /**
     * CommandInterface constructor.
     *
     * @param ConfigInterface $pConfig
     * @param InternalFactory $pInternalFactory
     * @param AbstractResponseReceiver $pResponseReceiver
     * @param array $pOptions
     */
    public function __construct(ConfigInterface $pConfig, InternalFactory $pInternalFactory, AbstractResponseReceiver $pResponseReceiver, $pOptions = array());

    /**
     * Processes the command
     */
    public function process();

    /**
     * Returns true if login is required for command, false otherwise
     *
     * @return bool
     */
    public function needsLogin();
}