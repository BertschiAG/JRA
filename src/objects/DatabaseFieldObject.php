<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: DatabaseFieldObject.php
 * Date: 13.01.2016
 * Time: 14:34
 */

namespace JRA\Objects;


use stdClass;

class DatabaseFieldObject
{

    /**
     * @var string
     */
    private $_field;

    /**
     * @var string
     */
    private $_type;

    /**
     * @var string
     */
    private $_collation;

    /**
     * @var string
     */
    private $_null;

    /**
     * @var string
     */
    private $_key;

    /**
     * @var string
     */
    private $_default;

    /**
     * @var string
     */
    private $_extra;

    /**
     * @var string
     */
    private $_privileges;

    /**
     * @var string
     */
    private $_comment;

    /**
     * @param stdClass $pObject
     */
    public function setFromObject($pObject)
    {
        $this->_field = $pObject->Field;
        $this->_type = $pObject->Type;
        $this->_collation = $pObject->Collation;
        $this->_null = $pObject->Null;
        $this->_key = $pObject->Key;
        $this->_default = $pObject->Default;
        $this->_extra = $pObject->Extra;
        $this->_privileges = $pObject->Privileges;
        $this->_comment = $pObject->Comment;
    }

    /**
     * @param string $pResponseString
     */
    public function setFromResponseString($pResponseString)
    {
        $this->setFromObject(
            json_decode($pResponseString)
        );
    }

    /**
     * @return string
     */
    public function getField()
    {
        return $this->_field;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @return string
     */
    public function getCollation()
    {
        return $this->_collation;
    }

    /**
     * @return string
     */
    public function getNull()
    {
        return $this->_null;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->_key;
    }

    /**
     * @return string
     */
    public function getDefault()
    {
        return $this->_default;
    }

    /**
     * @return string
     */
    public function getExtra()
    {
        return $this->_extra;
    }

    /**
     * @return string
     */
    public function getPrivileges()
    {
        return $this->_privileges;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->_comment;
    }
}