<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: PutContentUpdateIdTest.php
 * Date: 18.01.2016
 * Time: 11:59
 */

namespace JRA\Content;


use JRA\Library\AbstractTestCase;
use JRA\Objects\CreateContentObject;
use JRA\Objects\StateObject;
use JRA\Objects\UpdateContentObject;

class PutContentUpdateIdTest extends AbstractTestCase
{
    /**
     * @return boolean
     */
    public function test()
    {
        $errors = [];
        $errors[] = $this->_apiFacade->login()->error;

        $createContent = new CreateContentObject('testtesttesttesttesttesttesttest');
        $createContent->setState(StateObject::STATE_PUBLISHED);
        $this->_apiFacade->createContent($createContent)->getError();
        $tmp = $this->_apiFacade->getAllContents();
        foreach ($tmp->getContents() as $pValue) {
            if ($pValue->getTitle() == 'testtesttesttesttesttesttesttest') {
                $updateContent = new UpdateContentObject();
                $updateContent->setIntroText('Test');
                $errors[] = $this->_apiFacade->updateContentById($updateContent, $pValue->getId())->getError();
                if ($this->_apiFacade->getContentById($pValue->getId())->getContent()->getIntroText() == 'Test') {
                    $errors[] = false;
                } else {
                    $errors[] = true;
                }
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