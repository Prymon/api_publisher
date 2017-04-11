<?php

/* 符合gitbook标准的svn目录地址 */
define('SVN_PATH','https://192.168.1.2/svn/product_new/trunk/HSVS/doc/apidoc');
/* gitbook目录名，一般等于svn_path中最后一级目录 */
define('API_PATH_NAME', '/apidoc/');
/* 不用改 */
define('API_PATH', dirname(__FILE__) . '/book' . API_PATH_NAME);
