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

    /**
     * The standard exception code if there is not another one specified.
     */
    const JRA_EXCEPTION_UNDEFINED = 57000;

    /**
     * JRAException constructor.
     *
     * @param string $message The exception message.
     * @param int $code The exception code.
     * @param Exception|null $previous A previous exception.
     */
    public function __construct($message = 'Undefined exception message.', $code = JRAException::JRA_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('Joomla Rest API Exception: ' . $message, $code, $previous);
    }
}