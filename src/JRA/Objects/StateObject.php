<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: StateObject.php
 * Date: 09.03.2016
 * Time: 13:18
 */

namespace JRA\Objects;


class StateObject
{
    const STATE_TRASHED = -2;
    const STATE_UNPUBLISHED = 0;
    const STATE_PUBLISHED = 1;
    const STATE_ARCHIVED = 2;
}