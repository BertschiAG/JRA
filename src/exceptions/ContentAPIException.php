<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: ContentAPIException.php
 * Date: 05.01.2016
 * Time: 10:27
 */

namespace JRA\Exceptions;


use Exception;

class ContentAPIException extends APIException
{
    const CONTENT_API_EXCEPTION_UNDEFINED = 57800;

    public function __construct($message = 'Undefined exception message.', $code = ContentAPIException::CONTENT_API_EXCEPTION_UNDEFINED, Exception $previous = null)
    {
        parent:: __construct('Content API Exception: ' . $message, $code, $previous);
    }
}