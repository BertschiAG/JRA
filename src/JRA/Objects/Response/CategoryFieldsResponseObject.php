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
     * The objects which store the returned values.
     *
     * @var DatabaseFieldObject[]
     */
    private $_fields;

    /**
     * If an error occurred.
     *
     * @var string
     */
    private $_error;

    /**
     * Status of the request.
     *
     * @var string
     */
    private $_status;

    /**
     * CategoryFieldsResponseObject constructor.
     *
     * @param string $pResponse The response of the request.
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
     * Returns all database field objects.
     *
     * @return DatabaseFieldObject[]
     */
    public function getFields()
    {
        return $this->_fields;
    }

    /**
     * Returns if an error occurred.
     *
     * @return string
     */
    public function getError()
    {
        return $this->_error;
    }

    /**
     * Returns the status of the request.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->_status;
    }
}