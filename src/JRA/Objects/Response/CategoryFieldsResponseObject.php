<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: CategoryFieldsResponseObject.php
 * Date: 25.01.2016
 * Time: 12:17
 */

namespace JRA\Objects\Response;


use JRA\Objects\Response\Data\DatabaseFieldObject;

class CategoryFieldsResponseObject
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
     * CategoryFieldsResponseObject constructor.
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