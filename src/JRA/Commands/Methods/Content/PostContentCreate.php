<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: PostContentCreate.php
 * Date: 18.01.2016
 * Time: 11:58
 */

namespace JRA\Commands\Methods\Content;


use JRA\Abstracts\AbstractMethod;
use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;
use JRA\Objects\CreateContentObject;

class PostContentCreate extends AbstractMethod
{

    /**
     * PostContentCreate constructor.
     *
     * @param ConfigInterface $pConfig
     * @param InternalFactory $pInternalFactory
     */
    public function __construct(ConfigInterface $pConfig, InternalFactory $pInternalFactory)
    {
        $this->setAutoLogin(true);
        parent::__construct($pConfig, $pInternalFactory);
    }

    /**
     * The methods need to check addition arguments by itself.
     *
     * @return boolean
     */
    protected function _checkArguments()
    {
        $additionalArguments = $this->getAdditionalArguments();
        if (!empty($additionalArguments) && CreateContentObject::checkArguments($additionalArguments)) {
            return true;
        }
        return false;
    }
}