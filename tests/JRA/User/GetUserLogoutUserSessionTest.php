<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: GetUserLogoutUserSessionTest.php
 * Date: 18.01.2016
 * Time: 12:07
 */

namespace JRA\User;


use JRA\Configuration;
use JRA\Library\AbstractTestCase;

class GetUserLogoutUserSessionTest extends AbstractTestCase
{

    /**
     * @return boolean
     */
    public function test()
    {
        $errors = [];
        $session = $this->_apiFacade->loginUserCredentials(Configuration::USERNAME, Configuration::PASSWORD)->getSession();
        $response = $this->_apiFacade->logoutUserSession(Configuration::USERNAME, $session);
        $errors[] = $response->getError();
        if ($response->getJResponse() === true) {
            $errors[] = false;
        } else {
            $errors[] = true;
        }
        foreach ($errors as $pValue) {
            if ($pValue !== false) {
                return false;
            }
        }
        return true;
    }
}