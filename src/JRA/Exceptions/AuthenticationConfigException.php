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

    /**
     * The standard exception code if there is not another one specified.
     */
    const AUTHENTICATION_CONFIG_EXCEPTION_UNDEFINED = 57400;

    /**
     * The exception code if the authentication method is not set.
     */
    const AUTHENTICATION_CONFIG_EXCEPTION_METHOD_NOT_SET = 57401;

    /**
     * AuthenticationConfigException constructor.
     *
     * @param string $message The exception message.
     * @param int $code The exception code.
     * @param Exception|null $previous A previous exception.
     */
    public function __construct($message = 'Undefined exception message.', $code = AuthenticationConfigException::AUTHENTICATION_CONFIG_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('Authentication Config Exception: ' . $message, $code, $previous);
    }
}