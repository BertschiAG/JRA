<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: ContentFieldsResponseObject.php
 * Date: 27.01.2016
 * Time: 13:41
 */

namespace JRA\Objects\Response;


use JRA\Objects\Response\Data\DatabaseFieldObject;

class ContentFieldsResponseObject
{

    /**
     * @var DatabaseFieldObject[]
     */
    private $_fields;

    /**
     * @var string
     */
    private $_error;

    /**
     * @var string
     */
    private $_status;

    /**
     * ContentFieldsResponseObject constructor.
     *
     * @param string $pResponse
     */
    public function __construct($pResponse)
    {
        $object = json_decode($pResponse);
        foreach ($object->fields as $pValue) {
            $this->_fields[] = new DatabaseFieldObject($pValue);
        }
        $this->_error = $object->error;
        $this->_status = $object->status;
    }

    /**
     * @return DatabaseFieldObject[]
     */
    public function getFields()
    {
        return $this->_fields;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->_error;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_status;
    }
}