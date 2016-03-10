<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: UpdateUserProfileObject.php
 * Date: 20.01.2016
 * Time: 11:45
 */

namespace JRA\Objects;


class UpdateUserProfileObject
{

    /**
     * @var string
     */
    private $_name;

    /**
     * @var string
     */
    private $_username;

    /**
     * @var string
     */
    private $_email;

    /**
     * @var string
     */
    private $_block;

    /**
     * @var string
     */
    private $_sendEmail;

    /**
     * @var string
     */
    private $_registerDate;

    /**
     * @var string
     */
    private $_lastVisitDate;

    /**
     * @var string
     */
    private $_activation;

    /**
     * @var string
     */
    private $_params;

    /**
     * @var string
     */
    private $_lastResetTime;

    /**
     * @var string
     */
    private $_resetCount;

    /**
     * @var string
     */
    private $_otpKey;

    /**
     * @var string
     */
    private $_otep;

    /**
     * @var string
     */
    private $_requireReset;

    /**
     * @var array
     */
    private $_requestParams;

    /**
     * @return array
     */
    public function getRequestParams()
    {
        if (empty($this->_requestParams)) {
            $response = [];
            (empty($this->getName())) ?: $response['name'] = $this->getName();
            (empty($this->getUsername())) ?: $response['username'] = $this->getUsername();
            (empty($this->getEmail())) ?: $response['email'] = $this->getEmail();
            (empty($this->getBlock())) ?: $response['block'] = $this->getBlock();
            (empty($this->getSendEmail())) ?: $response['sendEmail'] = $this->getSendEmail();
            (empty($this->getRegisterDate())) ?: $response['registerDate'] = $this->getRegisterDate();
            (empty($this->getLastVisitDate())) ?: $response['lastvisitDate'] = $this->getLastVisitDate();
            (empty($this->getActivation())) ?: $response['activation'] = $this->getActivation();
            (empty($this->getParams())) ?: $response['params'] = $this->getParams();
            (empty($this->getLastResetTime())) ?: $response['lastResetTime'] = $this->getLastResetTime();
            (empty($this->getResetCount())) ?: $response['resetCount'] = $this->getResetCount();
            (empty($this->getOtpKey())) ?: $response['otpKey'] = $this->getOtpKey();
            (empty($this->getOtep())) ?: $response['otep'] = $this->getOtep();
            (empty($this->getRequireReset())) ?: $response['requireReset'] = $this->getRequireReset();
            $this->_requestParams = $response;
        }
        return $this->_requestParams;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $pName
     */
    public function setName($pName)
    {
        $this->_name = $pName;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * @param string $pUsername
     */
    public function setUsername($pUsername)
    {
        $this->_username = $pUsername;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param string $pEmail
     */
    public function setEmail($pEmail)
    {
        $this->_email = $pEmail;
    }

    /**
     * @return string
     */
    public function getBlock()
    {
        return $this->_block;
    }

    /**
     * @param string $pBlock
     */
    public function setBlock($pBlock)
    {
        $this->_block = $pBlock;
    }

    /**
     * @return string
     */
    public function getSendEmail()
    {
        return $this->_sendEmail;
    }

    /**
     * @param string $pSendEmail
     */
    public function setSendEmail($pSendEmail)
    {
        $this->_sendEmail = $pSendEmail;
    }

    /**
     * @return string
     */
    public function getRegisterDate()
    {
        return $this->_registerDate;
    }

    /**
     * @param string $pRegisterDate
     */
    public function setRegisterDate($pRegisterDate)
    {
        $this->_registerDate = $pRegisterDate;
    }

    /**
     * @return string
     */
    public function getLastVisitDate()
    {
        return $this->_lastVisitDate;
    }

    /**
     * @param string $pLastVisitDate
     */
    public function setLastVisitDate($pLastVisitDate)
    {
        $this->_lastVisitDate = $pLastVisitDate;
    }

    /**
     * @return string
     */
    public function getActivation()
    {
        return $this->_activation;
    }

    /**
     * @param string $pActivation
     */
    public function setActivation($pActivation)
    {
        $this->_activation = $pActivation;
    }

    /**
     * @return string
     */
    public function getParams()
    {
        return $this->_params;
    }

    /**
     * @param string $pParams
     */
    public function setParams($pParams)
    {
        $this->_params = $pParams;
    }

    /**
     * @return string
     */
    public function getLastResetTime()
    {
        return $this->_lastResetTime;
    }

    /**
     * @param string $pLastResetTime
     */
    public function setLastResetTime($pLastResetTime)
    {
        $this->_lastResetTime = $pLastResetTime;
    }

    /**
     * @return string
     */
    public function getResetCount()
    {
        return $this->_resetCount;
    }

    /**
     * @param string $pResetCount
     */
    public function setResetCount($pResetCount)
    {
        $this->_resetCount = $pResetCount;
    }

    /**
     * @return string
     */
    public function getOtpKey()
    {
        return $this->_otpKey;
    }

    /**
     * @param string $pOtpKey
     */
    public function setOtpKey($pOtpKey)
    {
        $this->_otpKey = $pOtpKey;
    }

    /**
     * @return string
     */
    public function getOtep()
    {
        return $this->_otep;
    }

    /**
     * @param string $pOtep
     */
    public function setOtep($pOtep)
    {
        $this->_otep = $pOtep;
    }

    /**
     * @return string
     */
    public function getRequireReset()
    {
        return $this->_requireReset;
    }

    /**
     * @param string $pRequireReset
     */
    public function setRequireReset($pRequireReset)
    {
        $this->_requireReset = $pRequireReset;
    }
}