#! /bin/sh

cd book && nohup php -c /home/peichongen/share/php/lib/ -S 0.0.0.0:8889 > debug.log 2>&1 &

