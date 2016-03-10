<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: CategoryResponseObject.php
 * Date: 07.03.2016
 * Time: 09:04
 */

namespace JRA\Objects\Response;


use JRA\Objects\Response\Data\CategoryObject;

class CategoryResponseObject
{

    /**
     * @var CategoryObject
     */
    private $_category;

    /**
     * @var string
     */
    private $_error;

    /**
     * @var string
     */
    private $_status;

    /**
     * CategoryResponseObject constructor.
     *
     * @param string $pResponse
     */
    public function __construct($pResponse)
    {
        $object = json_decode($pResponse);
        $this->_category = new CategoryObject($object->category);
        $this->_error = $object->error;
        $this->_status = $object->status;
    }

    /**
     * @return CategoryObject
     */
    public function getContent()
    {
        return $this->_category;
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