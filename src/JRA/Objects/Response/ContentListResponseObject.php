<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: ContentListResponseObject.php
 * Date: 20.01.2016
 * Time: 16:52
 */

namespace JRA\Objects\Response;


use JRA\Objects\Response\Data\ContentObject;

class ContentListResponseObject
{

    /**
     * @var ContentObject[]
     */
    private $_contents;

    /**
     * @var string
     */
    private $_error;

    /**
     * @var string
     */
    private $_status;

    /**
     * ContentListResponseObject constructor.
     *
     * @param string $pResponse
     */
    public function __construct($pResponse)
    {
        $object = json_decode($pResponse);
        foreach ($object as $pKey => $pValue) {
            if ($pKey != 'status' && $pKey != 'error') {
                $this->_contents[] = new ContentObject($pValue);
            }
        }
        $this->_error = $object->error;
        $this->_status = $object->status;
    }

    /**
     * @return ContentObject[]
     */
    public function getContents()
    {
        return $this->_contents;
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