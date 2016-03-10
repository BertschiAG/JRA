<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: ARSAPIException.php
 * Date: 05.01.2016
 * Time: 10:14
 */

namespace JRA\Exceptions;


use Exception;

class ARSAPIException extends APIException
{
    const ARS_API_EXCEPTION_UNDEFINED = 57700;

    public function __construct($message = 'Undefined exception message.', $code = ARSAPIException::ARS_API_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('ARS API Exception: ' . $message, $code, $previous);
    }
}