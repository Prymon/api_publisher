<?php

/**
 * Created by PhpStorm.
 * User: peichongen
 * Date: 2017/4/7 0007
 * Time: 10:33
 */
include_once '../config.php';
define('GITBOOK_BUILD_NAME', '/_book/');

/* list api dirs */
if (!is_dir(API_PATH)) {
    return;
}
$files = scandir(API_PATH);
$apiDirs = [];
foreach ($files as $file) {
    is_file($file) || $file[0] == '.' or ($apiDirs[] = $file);
}
foreach ($apiDirs as &$path) {
    $url = "http://" . $_SERVER["HTTP_HOST"] . API_PATH_NAME . $path . GITBOOK_BUILD_NAME;
    $name = strval($path);
    $path = [];
    $path['url'] = $url;
    $path['name'] = $name;
    unset($path);
}
$lis = "";
foreach ($apiDirs as $path) {
    $lis .= "<li><a href='{$path['url']}' >{$path['name']}</a></li><br/>";
}

$html = file_get_contents('template.html');
$html = str_replace('#title#', 'Seemmo Api Doc', $html);
$html = str_replace('#lis#', $lis, $html);
echo $html;