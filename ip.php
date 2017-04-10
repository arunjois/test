<?php
$command="/sbin/ifconfig wlp2s0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'";
$localIP = exec ($command);

?>
