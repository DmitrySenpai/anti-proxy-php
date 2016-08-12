<?php
include 'antiproxy.php';
$ip_addr = $_SERVER['REMOTE_ADDR'];
print('your IP:'.$ip_addr.'<br>This is good!');
?>