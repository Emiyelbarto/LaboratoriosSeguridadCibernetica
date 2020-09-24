<?php
class GetReservaciónApi {
 public $datosAretornar = "" ;
 public function __construct(){
 }
 public function getServicio(){
 $mensaje = "Servicio GET ejecutado.";
 $código_http = "200";
 $datosAretornar = array(
 "mensaje" => $mensaje,
 "codigo_http" => $código_http
 );
 $this->respuesta($datosAretornar);
 }
 public function respuesta($datosAretornar){ 
 header( "HTTP/1.1 ");
 header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json; charset=UTF-8");
echo json_encode($datosAretornar);
 exit;
 }
}
// Solicitar servicio
 $api = new GetReservaciónApi();
 $api->getServicio();
?>
