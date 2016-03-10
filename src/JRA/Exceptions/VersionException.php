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
    const VERSION_CONFIG_EXCEPTION_UNDEFINED = 57500;
    const VERSION_CONFIG_EXCEPTION_VERSION_NOT_SUPPORTED = 575001;

    public function __construct($message = 'Undefined exception message.', $code = VersionException::VERSION_CONFIG_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('Version Config Exception: ' . $message, $code, $previous);
    }
}