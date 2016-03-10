<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: DeleteContentIdTest.php
 * Date: 18.01.2016
 * Time: 11:59
 */

namespace JRA\Content;


use JRA\Library\AbstractTestCase;
use JRA\Objects\CreateContentObject;
use JRA\Objects\StateObject;

class DeleteContentIdTest extends AbstractTestCase
{

    /**
     * @return boolean
     */
    public function test()
    {
        $errors = [];
        $errors[] = $this->_apiFacade->login()->error;

        $content = new CreateContentObject('testtesttesttesttesttesttesttest');
        $content->setState(StateObject::STATE_PUBLISHED);
        $this->_apiFacade->createContent($content)->getError();
        $tmp = $this->_apiFacade->getAllContents();
        foreach ($tmp->getContents() as $pValue) {
            if ($pValue->getTitle() == 'testtesttesttesttesttesttesttest') {
                $errors[] = $this->_apiFacade->deleteContentById($pValue->getId())->getError();
            }
        }
        $errors[] = $this->_apiFacade->logout()->error;
        foreach ($errors as $pValue) {
            if ($pValue !== false) {
                return false;
            }
        }
        return true;
    }
}