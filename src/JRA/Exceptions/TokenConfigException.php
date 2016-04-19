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

    /**
     * The standard exception code if there is not another one specified.
     */
    const TOKEN_CONFIG_EXCEPTION_UNDEFINED = 57100;

    /**
     * The exception code if the token authentication is not enabled.
     */
    const TOKEN_CONFIG_EXCEPTION_NOT_ENABLED = 57101;

    /**
     * The exception code if the token is not set.
     */
    const TOKEN_CONFIG_EXCEPTION_TOKEN_NOT_SET = 57102;

    /**
     * TokenConfigException constructor.
     *
     * @param string $message The exception message.
     * @param int $code The exception code.
     * @param Exception|null $previous A previous exception.
     */
    public function __construct($message = 'Undefined exception message.', $code = TokenConfigException::TOKEN_CONFIG_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('Token Config Exception: ' . $message, $code, $previous);
    }
}