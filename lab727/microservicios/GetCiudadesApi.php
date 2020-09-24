<?php
include_once("../IdC.php");
class GetCiudadesApi
{
    protected $tokenDelPortador = "";
    protected $credencialesDelPortador = "";
    protected $datosAretornar = "";
    protected $vericado = "";
    public function __construct()
    {
    }
    public function checkToken()
    {
        $aplicación = htmlspecialchars($_POST['aplicación']);
        $contraseña = htmlspecialchars($_POST['contraseña']);

        $allHeaders = getallheaders();
        $authorization = $allHeaders['Authorization'];
        list($type, $data) = explode(" ", $authorization, 2);
        $this->tokenDelPortador = $data;

        $this->credencialesDelPortador = array();
        $this->credencialesDelPortador['aplicación'] = $aplicación;
        $this->credencialesDelPortador['contraseña'] = $contraseña;
        $idc = new IdC(
            $this->tokenDelPortador,
            $this->credencialesDelPortador
        );
        return $idc->decodeToken();
    }
    public function getServicio()
    {
        $this->vericado = $this->checkToken();
        if (!$this->vericado) {
            $this->datosAretornar = array(
                "mensaje" => "Error: Solicitud no autorizada.",
                "código_http" => "401",
                "token_del_portador" => $this->tokenDelPortador
            );
        } else {
            $this->datosAretornar = array(
                "mensaje" => "API servicio GET ejecutado.",
                "código_http" => "200",
                "token_del_portador" => $this->tokenDelPortador
            );
        }

        header("HTTP/1.1 " . $this->datosAretornar['código_http']);
        header("Access-Control-Allow-Origin: *");
        header("Content-Type:application/json;charset=UTF-8");
        header("X-Content-Type-Options: nosniff");
        header("Cache-Control: max-age=100");
        echo json_encode($this->datosAretornar);
        exit;
    }
}
// solicitar servicio
$api = new GetCiudadesApi();
$api->getServicio();
