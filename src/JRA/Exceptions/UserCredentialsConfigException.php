<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2015
 * User: jbaumann
 * File: UserCredentialsConfigException.php
 * Date: 23.12.2015
 * Time: 14:01
 */

namespace JRA\Exceptions;


use Exception;

class UserCredentialsConfigException extends AuthenticationConfigException
{
    const USER_CREDENTIALS_CONFIG_EXCEPTION_UNDEFINED = 57200;
    const USER_CREDENTIALS_CONFIG_EXCEPTION_NOT_ENABLED = 57201;
    const USER_CREDENTIALS_CONFIG_EXCEPTION_USER_CREDENTIALS_NOT_SET = 57202;

    public function __construct($message = 'Undefined exception message.', $code = UserCredentialsConfigException::USER_CREDENTIALS_CONFIG_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('User Credentials Config Exception: ' . $message, $code, $previous);
    }
}