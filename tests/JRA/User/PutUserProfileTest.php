<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: PutUserProfileTest.php
 * Date: 18.01.2016
 * Time: 12:08
 */

namespace JRA\User;


use Exception;
use JRA\Library\AbstractTestCase;

class PutUserProfileTest extends AbstractTestCase
{

    /**
     * @return boolean
     */
    public function test()
    {
        $errors = [];
        try {
            $this->_apiFacade->updateProfile();
            $errors[] = true;
        } catch (Exception $e) {
            if (strpos($e->getMessage(), 'Not supported yet!') === false) {
                $errors[] = true;
            } else {
                $errors[] = false;
            }
        }
        foreach ($errors as $pValue) {
            if ($pValue !== false) {
                return false;
            }
        }
        return true;
    }
}