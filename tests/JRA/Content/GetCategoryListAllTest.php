<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: GetCategoryListAllTest.php
 * Date: 18.01.2016
 * Time: 11:55
 */

namespace JRA\Content;


use JRA\Library\AbstractTestCase;

class GetCategoryListAllTest extends AbstractTestCase
{
    /**
     * @return boolean
     */
    public function test()
    {
        $errors = [];
        $errors[] = $this->_apiFacade->login()->error;
        $errors[] = $this->_apiFacade->getAllCategories()->getError();
        $errors[] = $this->_apiFacade->logout()->error;
        foreach ($errors as $pValue) {
            if ($pValue !== false) {
                return false;
            }
        }
        return true;
    }
}