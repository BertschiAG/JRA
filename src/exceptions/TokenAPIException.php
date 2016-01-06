<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: TokenAPIException.php
 * Date: 05.01.2016
 * Time: 10:34
 */

namespace JRA\Exceptions;


use Exception;

class TokenAPIException extends APIException
{
    const TOKEN_API_EXCEPTION_UNDEFINED = 57900;

    public function __construct($message = 'Undefined exception message.', $code = TokenAPIException::TOKEN_API_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('Token API Exception: ' . $message, $code, $previous);
    }
}