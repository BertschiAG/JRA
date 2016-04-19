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

    /**
     * The standard exception code if there is not another one specified.
     */
    const SERVER_CONFIG_EXCEPTION_UNDEFINED = 57300;

    /**
     * The exception code if the config was already filled.
     */
    const SERVER_CONFIG_EXCEPTION_ALREADY_DEFINED = 57301;

    /**
     * The exception code if the url is invalid.
     */
    const SERVER_CONFIG_EXCEPTION_URL_NOT_VALID = 57302;

    /**
     * The exception code the give host is invalid.
     */
    const SERVER_CONFIG_EXCEPTION_HOST_NOT_VALID = 57303;

    /**
     * The exception code if the url is undefined.
     */
    const SERVER_CONFIG_EXCEPTION_URL_UNDEFINED = 57304;

    /**
     * ServerConfigException constructor.
     *
     * @param string $message The exception message.
     * @param int $code The exception code.
     * @param Exception|null $previous A previous exception.
     */
    public function __construct($message = 'Undefined exception message.', $code = ServerConfigException::SERVER_CONFIG_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('Server Config Exception: ' . $message, $code, $previous);
    }
}