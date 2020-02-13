<?php
	function getRemoteAddr()
	{
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && (!isset($_SERVER['REMOTE_ADDR']) || preg_match('/^127\..*/i', trim($_SERVER['REMOTE_ADDR'])) || preg_match('/^172\.16.*/i', trim($_SERVER['REMOTE_ADDR'])) || preg_match('/^192\.168\.*/i', trim($_SERVER['REMOTE_ADDR'])) || preg_match('/^10\..*/i', trim($_SERVER['REMOTE_ADDR'])))) {
			if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')) {
				$ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
				return $ips[0];
			} else
				return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		return $_SERVER['REMOTE_ADDR'];
    }
    
    $ip = getRemoteAddr();

    $url = file_get_contents('https://api.ip2location.com/v2/?ip=' . $ip . '&key=demo&package=WS24&addon=continent,country,region,city,geotargeting,country_groupings,time_zone_info');
    
    $json = json_decode($url);

    $pais = $json->country_name;
    $estado = $json->region_name;
    $cidade = $json->city_name;
    $operadora = $json->isp;
    $latitude = $json->latitude;
    $longitude = $json->longitude;
    $coordenada = $latitude . ' ' .$longitude;
    $continente = $json->continent->name;

    echo "<b>INFORMAÇÕES DE $ip</b>";

    echo "<br><br>";
    echo "<b>Continente:</b> $continente";
    echo "<br>";
    echo "<b>País:</b> $pais";
    echo "<br>";
    echo "<b>Estado:</b> $estado";
    echo "<br>";
    echo "<b>Cidade:</b> $cidade";
    echo "<br>";
    echo "<b>Operadora:</b> $operadora";
    echo "<br>";
    echo "<b>Coordenada aproximada:</b> $coordenada";
    
?>