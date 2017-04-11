#! /bin/bash

# define process name
cmd="php -S 0.0.0.0:8889"

# find PID
fstr="ps -ef|grep \"${cmd}\"|grep -v grep|awk '{print \$2}'"
PID=`eval $fstr`
if test -n "$PID"
then
	echo "kill process $PID"
	kill ${PID}
else
	echo "no process to stop"
fi

