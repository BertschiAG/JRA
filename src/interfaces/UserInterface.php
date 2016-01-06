<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: UserInterface.php
 * Date: 05.01.2016
 * Time: 13:54
 */

namespace JRA\Interfaces;


use stdClass;

interface UserInterface
{
    /**
     * UserInterface constructor.
     * @param ConfigInterface $pConfig
     */
    public function __construct(ConfigInterface $pConfig);

    /**
     * @return stdClass
     */
    public function getUser();

    /**
     * @return stdClass
     */
    public function login();

    /**
     * @return stdClass
     */
    public function logout();

    /**
     * @return stdClass
     */
    public function getSessions();

    /**
     * @return stdClass
     */
    public function updateProfile();

    /**
     * @return stdClass
     */
    public function updateProfileById();
}