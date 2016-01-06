<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2015
 * User: jbaumann
 * File: TokenConfigException.php
 * Date: 23.12.2015
 * Time: 13:29
 */

namespace JRA\Exceptions;


use Exception;

class TokenConfigException extends AuthenticationConfigException
{
    const TOKEN_CONFIG_EXCEPTION_UNDEFINED = 57100;
    const TOKEN_CONFIG_EXCEPTION_NOT_ENABLED = 57101;
    const TOKEN_CONFIG_EXCEPTION_TOKEN_NOT_SET = 57102;

    public function __construct($message = 'Undefined exception message.', $code = TokenConfigException::TOKEN_CONFIG_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('Token Config Exception: ' . $message, $code, $previous);
    }
}