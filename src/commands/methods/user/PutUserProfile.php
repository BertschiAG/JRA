<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: PutUserProfile.php
 * Date: 18.01.2016
 * Time: 12:08
 */

namespace JRA\Commands\Methods\User;


use JRA\Abstracts\AbstractMethod;
use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;

class PutUserProfile extends AbstractMethod
{

    /**
     * PutUserProfile constructor.
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
     * @return boolean
     */
    protected function _checkArguments()
    {
        $urlParams = $this->getUrlParams();
        if (!empty($urlParams) && is_a($urlParams, 'UserProfileObject')) {
            return true;
        }
        return true;
    }
}