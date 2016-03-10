<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2015
 * User: jbaumann
 * File: NamespaceHierarchy.php
 * Date: 23.12.2015
 * Time: 08:50
 */

exec('cd C:\proj\JoomlaRestAPI && composer dump-autoload -o');

$autoLoader = require __DIR__ . '/../../vendor/autoload.php';
$classMap = array_intersect_key($autoLoader->getClassMap(), array_flip(preg_grep('/JRA\\\/', array_keys($autoLoader->getClassMap()))));
$parsed = array();

foreach ($classMap as $pKey => $pValue) {
    $indexes = explode('\\', $pKey);
    $tmp = &$parsed;
    foreach ($indexes as $pSubValue) {
        if (!isset($tmp[$pSubValue])) {
            $tmp[$pSubValue] = '';
        }
        $tmp = &$tmp[$pSubValue];
    }
    $tmp = pathinfo($pValue, PATHINFO_FILENAME);
}

echo '<pre>', print_r($parsed, true), '</pre>';