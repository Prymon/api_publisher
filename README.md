# apidoc
automatic api publisher, using svn&amp;gitbook

## 1. require

* requires PHP 5.4 or later.
* node.js
* node.js module "gitbook" CLI version: 2.3.0 GitBook version: 3.2.2(https://github.com/GitbookIO/gitbook) 

## 2. install

* test on CentOS release 6.4
* add php&node into $PATH
* chmod u+x start.sh stop.sh
* add update.sh into crontab, eg. 
	> crontab -e
	> */1 * * * * export LANG=zh_CN.UTF-8 && cd /home/peichongen/apidoc/book/ && /home/peichongen/share/php/bin/php -c /home/peichongen/share/php/lib/ update.php >> /home/peichongen/apidoc/book/update.log 2>&1
