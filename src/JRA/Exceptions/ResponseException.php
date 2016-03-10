<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: ResponseException.php
 * Date: 07.03.2016
 * Time: 08:36
 */

namespace JRA\Exceptions;


use Exception;

class ResponseException extends JRAException
{
    const RESPONSE_EXCEPTION_UNDEFINED = 58200;

    public function __construct($message = 'Undefined exception message.', $code = ResponseException::RESPONSE_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('Server Config Exception: ' . $message, $code, $previous);
    }
}