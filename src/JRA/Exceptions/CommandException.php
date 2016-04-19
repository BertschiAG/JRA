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

    /**
     * The standard exception code if there is not another one specified.
     */
    const COMMAND_EXCEPTION_UNDEFINED = 58100;

    /**
     * The exception code if the response of the cAPI contains an error.
     */
    const COMMAND_EXCEPTION_RESPONSE_ERROR = 58101;

    /**
     * The exception code if the response of the cAPI returns an invalid route exception.
     */
    const COMMAND_EXCEPTION_ROUTES_ERROR = 58102;

    /**
     * The exception code if the response of the cAPI returns that there was an error in the given additional arguments.
     */
    const COMMAND_EXCEPTION_ADDITIONAL_ARGUMENTS_ERROR = 58103;

    /**
     * CommandException constructor.
     *
     * @param string $message The exception message.
     * @param int $code The exception code.
     * @param Exception|null $previous A previous exception.
     */
    public function __construct($message = 'Undefined exception message.', $code = CommandException::COMMAND_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('Command Exception: ' . $message, $code, $previous);
    }
}