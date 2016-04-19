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

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/content/get-category-list-all
     */
    const GET_CATEGORY_LIST_ALL = 'category/list/all';

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/content/get-category-list-id-categories
     */
    const GET_CATEGORY_LIST_ID_CATEGORIES = 'category/list/:id/categories';

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/content/get-content-list-all
     */
    const GET_CONTENT_LIST_ALL = 'content/list/all';

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/content/get-category-fields
     */
    const GET_CATEGORY_FIELDS = 'category/fields';

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/content/get-category-list-id-content
     */
    const GET_CATEGORY_LIST_ID_CONTENT = 'category/list/:id/content';

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/content/get-category-single-id
     */
    const GET_CATEGORY_SINGLE_ID = 'category/single/:id';

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/content/get-content-fields
     */
    const GET_CONTENT_FIELDS = 'content/fields';

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/content/get-content-id-4
     */
    const GET_CONTENT_DELETE_ID = 'content/delete/:id';

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/content/get-content-single-id
     */
    const GET_CONTENT_SINGLE_ID = 'content/single/:id';

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/content/post-content-create
     */
    const POST_CONTENT_CREATE = 'content/create';

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/content/delete-content-id
     */
    const DELETE_CONTENT_ID = 'content/delete/:id';

    /**
     * @link http://learn.getcapi.org/api-methods/joomla-api-routes/content/put-content-update-id
     */
    const POST_CONTENT_UPDATE_ID = 'content/update/:id';

}