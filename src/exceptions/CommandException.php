<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: CommandException.php
 * Date: 11.01.2016
 * Time: 09:22
 */

namespace JRA\Exceptions;


use Exception;

class CommandException extends JRAException
{
    const COMMAND_EXCEPTION_UNDEFINED = 58100;
    const COMMAND_EXCEPTION_RESPONSE_ERROR = 58101;
    const COMMAND_EXCEPTION_ROUTES_ERROR = 58102;
    const COMMAND_EXCEPTION_ADDITIONAL_ARGUMENTS_ERROR = 58103;

    public function __construct($message = 'Undefined exception message.', $code = CommandException::COMMAND_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('Command Exception: ' . $message, $code, $previous);
    }
}