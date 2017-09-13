<?php
//Author: DMITRYLC
//Script Anti-proxy 1.5
//https://github.com/DMITRYLC

//IP conclusion
$ip_addr = $_SERVER['REMOTE_ADDR'];

	if (('127.0.0.1') == ($ip_addr)) {
		#ignore
	}
	else
	{




//list site
$url1 = 'http://proxy.mind-media.com/block/proxycheck.php?ip={ip_addres}';
$url2 = 'http://www.stopforumspam.com/api?ip={ip_addres}';
$url3 = 'http://www.stopforumspam.com/api?ip=127.0.0.1'; //TEST API stopforumspam.com
//replacement {ip_addres} to $ip_addr
$url_done_1 = str_replace("{ip_addres}",$ip_addr,$url1);
$url_done_2 = str_replace("{ip_addres}",$ip_addr,$url2);
//conclusion
$blacklist_1 = file_get_contents($url_done_1);
$blacklist_2 = file_get_contents($url_done_2);
$blacklist_3 = file_get_contents($url3); //TEST API stopforumspam.com

//www.shroomery.org
if (('Y') == ($blacklist_1)) {
	$error = 1;
}

//www.stopforumspam.com
if (($blacklist_3) == ($blacklist_2)) {
	#ignore
}
else
{
	$error = 1;
}

//lf $error = 1, the access to the site is closed
if (($error) == ('1')) {
	header('Location: proxy.php');
}




	}
?>
