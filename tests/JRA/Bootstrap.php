<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: Bootstrap.php
 * Date: 10-03-2016
 * Time: 15:00
 */
$autoLoader = require __DIR__ . '/../../vendor/autoload.php';
$classMap = array_intersect_key($autoLoader->getClassMap(), array_flip(preg_grep('/JRA\\.*Test$/', array_keys($autoLoader->getClassMap()))));
$tests = [];
$tests[] = new JRA\Content\DeleteContentIdTest();
$tests[] = new JRA\Content\GetCategoryFieldsTest();
$tests[] = new JRA\Content\GetCategoryListAllTest();
$tests[] = new JRA\Content\GetCategoryListIdCategoriesTest();
$tests[] = new JRA\Content\GetCategoryListIdContentTest();
$tests[] = new JRA\Content\GetCategorySingleIdTest();
$tests[] = new JRA\Content\GetContentFieldsTest();
$tests[] = new JRA\Content\GetContentListAllTest();
$tests[] = new JRA\Content\GetContentSingleIdTest();
$tests[] = new JRA\Content\PostContentCreateTest();
$tests[] = new JRA\Content\PutContentUpdateIdTest();
$tests[] = new JRA\Token\GetTokenTokenTest();
$tests[] = new JRA\User\GetUserLoginUsernamePasswordTest();
$tests[] = new JRA\User\GetUserLogoutUserSessionTest();
$tests[] = new JRA\User\GetUserSessionsTest();
$tests[] = new JRA\User\GetUserTest();
$tests[] = new JRA\User\PutUserProfileIdTest();
$tests[] = new JRA\User\PutUserProfileTest();
$result = [];
$resultBool = true;
/** @var \JRA\Library\AbstractTestCase $pValue */
foreach ($tests as $pValue) {
    try {
        $res = $pValue->test();
    } catch (Guzzle\Http\Exception\BadResponseException $e) {
        $resultSpan = '<span style="color:red">' . print_r($e->getResponse()->getBody(true), true) . ' - - ' . $e->getRequest()->getPath() . '</span>';
    }
    if (!isset($resultSpan) && isset($res)) {
        if ($res === true) {
            $resultSpan = '<span style="color:green">true</span>';
        } else {
            $resultSpan = '<span style="color:red">false</span>';
            $resultBool = false;
        }
    } elseif (!isset($resultSpan)) {
        $resultSpan = '<span style="color:red">Not declared yet.</span>';
        $resultBool = false;
    }
    $result[get_class($pValue)] = $resultSpan;
    unset($resultSpan);
}
if ($resultBool) {
    $resultSpan = '<span style="color:green">true</span>';
} else {
    $resultSpan = '<span style="color:red">false</span>';
}
echo '<pre>', print_r($result, true), '</pre>' . 'Result: ' . $resultSpan;