<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2015
 * User: jbaumann
 * File: VersionException.php
 * Date: 24.12.2015
 * Time: 09:03
 */

namespace JRA\Exceptions;


use Exception;


class VersionException extends JRAException
{

    /**
     * The standard exception code if there is not another one specified.
     */
    const VERSION_CONFIG_EXCEPTION_UNDEFINED = 57500;

    /**
     * The exception cod eif the selected version of the cAPI is not supported.
     */
    const VERSION_CONFIG_EXCEPTION_VERSION_NOT_SUPPORTED = 575001;

    /**
     * VersionException constructor.
     *
     * @param string $message The exception message.
     * @param int $code The exception code.
     * @param Exception|null $previous A previous exception.
     */
    public function __construct($message = 'Undefined exception message.', $code = VersionException::VERSION_CONFIG_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('Version Config Exception: ' . $message, $code, $previous);
    }
}