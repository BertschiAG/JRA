<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2015
 * User: jbaumann
 * File: ARSAnnatech.php
 * Date: 23.12.2015
 * Time: 16:30
 */

namespace JRA\Config;


class ARSAnnatech
{
    
    /**
     * The configured dlId.
     *
     * @var string
     */
    private $_dlId;

    /**
     * Sets the dlId.
     *
     * @param string $pDlId The dlId which should be set.
     */
    public function setDlId($pDlId)
    {
        $this->_dlId = $pDlId;
    }
}