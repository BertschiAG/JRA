<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2015
 * User: jbaumann
 * File: ServerConfigException.php
 * Date: 23.12.2015
 * Time: 14:19
 */

namespace JRA\Exceptions;


use Exception;

class ServerConfigException extends JRAException
{
    const SERVER_CONFIG_EXCEPTION_UNDEFINED = 57300;
    const SERVER_CONFIG_EXCEPTION_ALREADY_DEFINED = 57301;
    const SERVER_CONFIG_EXCEPTION_URL_NOT_VALID = 57302;
    const SERVER_CONFIG_EXCEPTION_HOST_NOT_VALID = 57303;
    const SERVER_CONFIG_EXCEPTION_URL_UNDEFINED = 57304;

    public function __construct($message = 'Undefined exception message.', $code = ServerConfigException::SERVER_CONFIG_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('Server Config Exception: ' . $message, $code, $previous);
    }
}