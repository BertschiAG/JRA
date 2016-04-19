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

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/user/get-user
     */
    const GET_USER = 'user';

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/user/get-user-login-username-password
     */
    const GET_USER_LOGIN_USERNAME_PASSWORD = 'user/login/:username/:password';

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/user/get-user-logout-user-session
     */
    const GET_USER_LOGOUT_USER_SESSION = 'user/logout/:username/:session';

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/user/get-user-sessions
     */
    const GET_USER_SESSIONS = 'user/sessions';

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/user/update-user-profile
     */
    const PUT_USER_PROFILE = 'user/profile';

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/user/update-user-profile-by-id
     */
    const PUT_USER_PROFILE_ID = 'user/profile/:id';
}