<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: TokenInterface.php
 * Date: 05.01.2016
 * Time: 13:55
 */

namespace JRA\Interfaces;


use stdClass;

interface TokenInterface
{
    /**
     * TokenInterface constructor.
     * @param ConfigInterface $pConfig
     */
    public function __construct(ConfigInterface $pConfig);

    /**
     * @return stdClass
     */
    public function login();
}