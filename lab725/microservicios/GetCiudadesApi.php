<?php
include_once("../IdC.php");
class GetCiudadesApi{
 protected $tokenDelPortador = "";
 protected $credencialesDelPortador = "";
 protected $datosAretornar = "" ;
 protected $vericado = "";
 public function __construct(){
 }
 public function checkToken(){
 $aplicación = htmlspecialchars($_POST['aplicación']);
 $contraseña = htmlspecialchars($_POST['contraseña']);

 $allHeaders = getallheaders();
 $authorization = $allHeaders['Authorization'];
 list($type, $data) = explode(" ", $authorization, 2);
 $this->tokenDelPortador = $data;

 $this->credencialesDelPortador = array();
 $this->credencialesDelPortador['aplicación'] = $aplicación;
 $this->credencialesDelPortador['contraseña'] = $contraseña;
 $idc = new IdC($this->tokenDelPortador,
$this->credencialesDelPortador);
 return $idc->decodeToken();
 }