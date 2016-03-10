<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: APIException.php
 * Date: 05.01.2016
 * Time: 10:09
 */

namespace JRA\Exceptions;


use Exception;

class APIException extends JRAException
{
    const API_EXCEPTION_UNDEFINED = 57600;
    const API_EXCEPTION_NO_RESPONSE = 57601;

    public function __construct($message = 'Undefined exception message.', $code = APIException::API_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('API Exception: ' . $message, $code, $previous);
    }
}