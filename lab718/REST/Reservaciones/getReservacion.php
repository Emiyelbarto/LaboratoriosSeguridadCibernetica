<?php
// en este ejemplo utilizamos Curl para solicitar un recurso
// de la API GetReservaciónApi
$servicio_url = 'http://localhost:8080/REST/Reservaciones/getReservacionApi.php?id=1';
$curl = curl_init($servicio_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_respuesta = curl_exec($curl);
if ($curl_respuesta === false) {
 $info = curl_getinfo($curl);
 curl_close($curl);
 die('Error durante ejecución de Curl: ' .
 var_export($info));
}
curl_close($curl);
// la respuesta descifrada
$descifrado = json_decode($curl_respuesta,true);
echo $descifrado["mensaje"];
echo "<br>Código http: ".$descifrado["código_http"];