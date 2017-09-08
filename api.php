<?php
//Author: DMITRYLC
//Script Anti-proxy 1.5
//https://github.com/DMITRYLC

//IP conclusion
if (isset($_GET["ip"])) {
	$ip_addr = $_GET["ip"];
	//list site
	$url1 = 'http://www.shroomery.org/ythan/proxycheck.php?ip={ip_addres}';
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
		$output = 1;
	}
	
	//www.stopforumspam.com
	if (($blacklist_3) == ($blacklist_2)) {
		#ignore
	}
	else
	{
		$output = 1;
	}
	
	//lf $error = 1, the access to the site is closed
	if (($output) == ('1')) {
		$output_of_result = array('proxy' => 1);
	}
	else
	{
		$output_of_result = array('proxy' => 0);
	}
}
else
{
	$output_of_result = array('error' => 1);
}

echo json_encode($output_of_result);
?>