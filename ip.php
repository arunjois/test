<?php
//$command="/sbin/ifconfig wlp2s0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'";
$command="/sbin/ifconfig enp3s0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'";
$localIP = exec ($command);
//$localIP="192.168.43.245";
//$localIP="192.168.1.105";
//echo $localIP;
?>
