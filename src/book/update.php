<?php

/**
 * 查看是否checkout了，如果是则检查svn是否有更新，有则更新并rebuild
 * Created by PhpStorm.
 * User: peichongen
 * Date: 2017/4/7 0007
 * Time: 10:33
 */

include_once '../config.php';
header("Content-type:text/html;charset=utf-8");

$cd = "cd " . API_PATH;
ob_start();
echo $ck = shell_exec('svn checkout ' . SVN_PATH);
echo shell_exec("$cd && svn update");
$ls = shell_exec("$cd && ls -l|grep \"^d\"|awk '{print $9}'");
$ls = explode("\n", $ls);
$svnUp = intval(shell_exec("$cd && svn up|wc -l"));
if ($svnUp >= 2 || sizeof(explode("\n", $ck)) >= 3) {
    foreach ($ls as $dirName) {
        if ($dirName) {
            $buildShell = "$cd/$dirName && gitbook build";
            echo shell_exec($buildShell);
        }
    }
} else {
    echo "is new " . date("Y-m-d H:i:s") . "\n";
}

/* log */
$log = ob_get_flush();
file_put_contents('./update.log',"\n===========================\n".$log."\n========================\n",FILE_APPEND);
