<?php
include_once("IdP / IdP . php");
$aplicación = "Bazar";
$contraseña = "123";
$credenciales = array();
$credenciales['aplicación'] = $aplicación;
$credenciales['contraseña'] = $contraseña;
$credenciales['caducidad'] = time() + (60 * 60);
$idp = new IdP($credenciales);
$token = $idp->getToken();
$APIurl = "http://localhost:8080/lab722/Bazar/IdP/microservicios/GetCiudadesApi.php";
// crear Curl handle (ch) al recurso url
$ch = curl_init($APIurl);
// definir opciones HEADER
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_USERPWD, "$aplicación:$contraseña");
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Autorización: Portador" . $token));
