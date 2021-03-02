<?php
    require __DIR__.'/src/functions.php';

    $ip = getRemoteAddress();

    $informations = getInformations($ip);
    
    $json = json_decode($informations);

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