<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: GetCategoryListIdCategoriesTest.php
 * Date: 18.01.2016
 * Time: 11:56
 */

namespace JRA\Content;


use JRA\Configuration;
use JRA\Library\AbstractTestCase;

class GetCategoryListIdCategoriesTest extends AbstractTestCase
{
    /**
     * @return boolean
     */
    public function test()
    {
        $errors = [];
        $errors[] = $this->_apiFacade->login()->error;
        $errors[] = $this->_apiFacade->getAllSubCategoriesByParentId(Configuration::TEST_CATEGORY)->getError();
        $errors[] = $this->_apiFacade->logout()->error;
        foreach ($errors as $pValue) {
            if ($pValue !== false) {
                return false;
            }
        }
        return true;
    }
}