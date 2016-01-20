<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: UserRoutes.php
 * Date: 13.01.2016
 * Time: 15:48
 */

namespace JRA\Commands\Routes;


class UserRoutes
{
    const GET_USER = 'user';
    const GET_USER_LOGIN_USERNAME_PASSWORD = 'user/login/:username/:password';
    const GET_USER_LOGOUT_USER_SESSION = 'user/logout/:username/:password';
    const GET_USER_SESSIONS = 'user/sessions';
    const PUT_USER_PROFILE = 'user/profile';
    const PUT_USER_PROFILE_ID = 'user/profile/:id';
}