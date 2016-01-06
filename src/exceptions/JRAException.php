<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2015
 * User: jbaumann
 * File: JRAException.php
 * Date: 23.12.2015
 * Time: 13:30
 */

namespace JRA\Exceptions;


use Exception;

class JRAException extends Exception
{
    const JRA_EXCEPTION_UNDEFINED = 57000;

    public function __construct($message = 'Undefined exception message.', $code = JRAException::JRA_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('Joomla Rest API Exception:' . $message, $code, $previous);
    }
}