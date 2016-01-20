<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: AbstractResponseObject.php
 * Date: 13.01.2016
 * Time: 08:21
 */

namespace JRA\Abstracts;


use stdClass;

abstract class AbstractResponseObject
{
    /**
     * @var string
     */
    protected $_rawString;

    /**
     * @var string|stdClass
     */
    protected $_msg;

    /**
     * @var boolean
     */
    protected $_error;

    /**
     * @var integer
     */
    protected $_status;

    /**
     * CAPIResponseObject constructor.
     *
     * @param string $pResponseString
     */
    public function __construct($pResponseString)
    {
        $this->_rawString = $pResponseString;
        $this->_parseResponseString();
        $this->_parse();
    }

    private function _parseResponseString()
    {
        $object = json_decode($this->_rawString);
        $this->_msg = $object->msg;
        $this->_error = $object->error;
        $this->_status = $object->status;
    }

    /**
     * Class specified parsing
     *
     * @return boolean
     */
    abstract protected function _parse();

    /**
     * @return string
     */
    public function getRawString()
    {
        return $this->_rawString;
    }

    /**
     * @return stdClass|string
     */
    public function getMsg()
    {
        return $this->_msg;
    }

    /**
     * @return boolean
     */
    public function isError()
    {
        return $this->_error;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->_status;
    }
}