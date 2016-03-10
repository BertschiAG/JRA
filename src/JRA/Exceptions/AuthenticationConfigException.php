<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2015
 * User: jbaumann
 * File: AuthenticationConfigException.php
 * Date: 24.12.2015
 * Time: 08:04
 */

namespace JRA\Exceptions;


use Exception;

class AuthenticationConfigException extends JRAException
{
    const AUTHENTICATION_CONFIG_EXCEPTION_UNDEFINED = 57400;
    const AUTHENTICATION_CONFIG_EXCEPTION_METHOD_NOT_SET = 57401;

    public function __construct($message = 'Undefined exception message.', $code = AuthenticationConfigException::AUTHENTICATION_CONFIG_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('Authentication Config Exception: ' . $message, $code, $previous);
    }
}