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
