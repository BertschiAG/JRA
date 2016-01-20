<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: ContentRoutes.php
 * Date: 13.01.2016
 * Time: 15:53
 */

namespace JRA\Commands\Routes;


class ContentRoutes
{
    const GET_CATEGORY_LIST_ALL = 'category/list/all';
    const GET_CATEGORY_LIST_ID_CATEGORIES = 'category/list/:id/categories';
    const GET_CONTENT_LIST_ALL = 'content/list/all';
    const GET_CATEGORY_FIELDS = 'category/fields';
    const GET_CATEGORY_LIST_ID_CONTENT = 'category/list/:id/content';
    const GET_CATEGORY_SINGLE_ID = 'category/single/:id';
    const GET_CONTENT_FIELDS = 'content/fields';
    const GET_CONTENT_ID = 'content/delete/:id';
    const GET_CONTENT_SINGLE_ID = 'content/single/:id';
    const POST_CONTENT_CREATE = 'content/create';
    const DELETE_CONTENT_ID = 'content/delete/:id';
    const PUT_CONTENT_UPDATE_ID = 'content/update/:id';

}