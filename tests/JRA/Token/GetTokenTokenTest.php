<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: GetTokenTokenTest.php
 * Date: 18.01.2016
 * Time: 12:06
 */

namespace JRA\Token;


use JRA\Configuration;
use JRA\Library\AbstractTestCase;

class GetTokenTokenTest extends AbstractTestCase
{
    /**
     * @return boolean
     */
    public function test()
    {
        $errors = [];
        $response = $this->_apiFacade->loginToken(Configuration::TOKEN);
        $errors[] = $response->getError();
        if ($response->getJResponse() === 'true') {
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