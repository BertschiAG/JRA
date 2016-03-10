<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: GetContentSingleIdTest.php
 * Date: 18.01.2016
 * Time: 11:58
 */

namespace JRA\Content;


use JRA\Library\AbstractTestCase;

class GetContentSingleIdTest extends AbstractTestCase
{
    /**
     * @return boolean
     */
    public function test()
    {
        $errors = [];
        $errors[] = $this->_apiFacade->login()->error;
        $errors[] = $this->_apiFacade->getContentById('1')->getError();
        $errors[] = $this->_apiFacade->logout()->error;
        foreach ($errors as $pValue) {
            if ($pValue !== false) {
                return false;
            }
        }
        return true;
    }
}