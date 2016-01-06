<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: UserAPIException.php
 * Date: 05.01.2016
 * Time: 10:08
 */

namespace JRA\Exceptions;


use Exception;

class UserAPIException extends APIException
{
    const USER_API_EXCEPTION_UNDEFINED = 58000;

    public function __construct($message = 'Undefined exception message.', $code = APIException::API_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('User API Exception: ' . $message, $code, $previous);
    }
}