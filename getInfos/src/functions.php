<?php
	function getRemoteAddress()
	{
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && (!isset($_SERVER['REMOTE_ADDR']) || preg_match('/^127\..*/i', trim($_SERVER['REMOTE_ADDR'])) || preg_match('/^172\.16.*/i', trim($_SERVER['REMOTE_ADDR'])) || preg_match('/^192\.168\.*/i', trim($_SERVER['REMOTE_ADDR'])) || preg_match('/^10\..*/i', trim($_SERVER['REMOTE_ADDR']))))
		{
			if (strpos($_SERVER['HTTP_X_FORWARDED'], ',')) 
			{
				$ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
					
				return $ips[0];
			}
			else
			{
				return $_SERVER['HTTP_X_FORWARDED_FOR'];
			}
		}

		return $_SERVER['REMOTE_ADDR'];
	}

	function getInformations($ip)
	{
		$jsonReceived = file_get_contents('https://api.ip2location.com/v2/?ip=' . $ip . '&key=demo&package=WS24&addon=continent,country,region,city,geotargeting,country_groupings,time_zone_info');

		return $jsonReceived;
	}
?>