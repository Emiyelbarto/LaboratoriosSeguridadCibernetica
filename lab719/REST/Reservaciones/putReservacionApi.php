<?php
class PutReservaciónApi
{
    public $datosAretornar = "";
    public function __construct()
    {
    }
    public function putServicio()
    {
        if (
            isset($_POST['apiClave']) &&
            $_POST['apiClave'] !== '1234567890' &&
            $_POST['método'] !== 'PUT'
        ) {
            $datosAretornar = array(
                "mensaje" => "Servicio no disponible",
                "código_http" => "401"
            );
        } else {
            $datosAretornar = array(
                "mensaje" => "Servicio PUT ejecutado",
                "clave" => $_POST['apiClave'],
                "codigo_http" => "200"
            );
        }
        $datosAretornar = json_encode($datosAretornar);
        if ($datosAretornar != '') echo $datosAretornar;
    }
}
// solicitar servicio PUT
$api = new PutReservaciónApi();
$api->putServicio();
