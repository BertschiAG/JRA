<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: GetUserTest.php
 * Date: 18.01.2016
 * Time: 12:07
 */

namespace JRA\User;


use JRA\Library\AbstractTestCase;

class GetUserTest extends AbstractTestCase
{
    /**
     * @return boolean
     */
    public function test()
    {
        $errors = [];
        $this->_apiFacade->login();
        $errors[] = $this->_apiFacade->getCurrentUser()->getError();
        $this->_apiFacade->logout();
        foreach ($errors as $pValue) {
            if ($pValue !== false) {
                return false;
            }
        }
        return true;
    }
}