<?php
$servicio_url = 'http://localhost:8080/lab719/REST/Reservaciones/putReservacionApi.php';
$curl = curl_init($servicio_url);
$curl_post_datos = array(
'mensaje' => 'Probando 1,2,3',
'método' => 'PUT',
'apiClave' => '1234567890'
);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_datos);
$curl_respuesta = curl_exec($curl);
if ($curl_respuesta === false) {
 $info = curl_getinfo($curl);
 curl_close($curl);
 die('Error: ' . var_export($info));
}
curl_close($curl);
$descifrado = json_decode($curl_respuesta,true);
if (isset($descifrado->respuesta->estado) && $descifrado->respuesta->estado == 'ERROR') {
 die('Error: ' . $descifrado->respuesta->mensajeDeError);
}
echo $descifrado["mensaje"];
echo "<br>Código http: ".$descifrado["código_http"];
?>
