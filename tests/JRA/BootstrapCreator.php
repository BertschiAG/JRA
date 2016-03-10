<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: BootstrapCreator.php
 * Date: 08.03.2016
 * Time: 15:28
 */

exec('cd C:\proj\JoomlaRestAPI && composer dump-autoload -o');

$autoLoader = require __DIR__ . '/../../vendor/autoload.php';
$classMap = array_intersect_key($autoLoader->getClassMap(), array_flip(preg_grep('/JRA\\\\.*Test$/', array_keys($autoLoader->getClassMap()))));
$data[] = '<?php';
$data[] = '/**';
$data[] = ' * Created by PhpStorm.';
$data[] = ' * Copyright: Bertschi AG, 2016';
$data[] = ' * User: jbaumann';
$data[] = ' * File: Bootstrap.php';
$data[] = ' * Date: ' . date('d-m-Y');
$data[] = ' * Time: ' . date('H:i');
$data[] = ' */';
$data[] = '$autoLoader = require __DIR__ . \'/../../vendor/autoload.php\';';
$data[] = '$classMap = array_intersect_key($autoLoader->getClassMap(), array_flip(preg_grep(\'/JRA\\\\.*Test$/\', array_keys($autoLoader->getClassMap()))));';
$data[] = '$tests = [];';
foreach ($classMap as $pKey => $pValue) {
    $name = explode('\\', $pKey);
    $data[] = '$tests[] = new ' . $pKey . '();';
}
$data[] = '$result = [];';
$data[] = '$resultBool = true;';
$data[] = '/** @var \JRA\Library\AbstractTestCase $pValue */';
$data[] = 'foreach ($tests as $pValue) {';
$data[] = '    try {';
$data[] = '        $res = $pValue->test();';
$data[] = '    } catch (Guzzle\Http\Exception\BadResponseException $e) {';
$data[] = '        $resultSpan = \'<span style="color:red">\' . print_r($e->getResponse()->getBody(true), true) . \' - - \' . $e->getRequest()->getPath() . \'</span>\';';
$data[] = '    }';
$data[] = '    if (!isset($resultSpan) && isset($res)) {';
$data[] = '        if ($res === true) {';
$data[] = '            $resultSpan = \'<span style="color:green">true</span>\';';
$data[] = '        } else {';
$data[] = '            $resultSpan = \'<span style="color:red">false</span>\';';
$data[] = '            $resultBool = false;';
$data[] = '        }';
$data[] = '    } elseif (!isset($resultSpan)) {';
$data[] = '        $resultSpan = \'<span style="color:red">Not declared yet.</span>\';';
$data[] = '        $resultBool = false;';
$data[] = '    }';
$data[] = '    $result[get_class($pValue)] = $resultSpan;';
$data[] = '    unset($resultSpan);';
$data[] = '}';
$data[] = 'if ($resultBool) {';
$data[] = '    $resultSpan = \'<span style="color:green">true</span>\';';
$data[] = '} else {';
$data[] = '    $resultSpan = \'<span style="color:red">false</span>\';';
$data[] = '}';
$data[] = 'echo \'<pre>\', print_r($result, true), \'</pre>\' . \'Result: \' . $resultSpan;';
file_put_contents(__DIR__ . '/Bootstrap.php', implode("\r\n", $data));