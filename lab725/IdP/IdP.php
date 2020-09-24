<?php
include_once("jwt_helper.php");
class IdP extends JWT
{
    protected $credencialesDelPortador = "";
    protected $tokenDelPortador = "";
    protected $credenciales = "";
    public function __construct($credencialesDelPortador)
    {
        $this->credencialesDelPortador =
            $credencialesDelPortador;
    }
    public function getToken()
    {
        $token = JWT::encode(
            $this->credencialesDelPortador,
            "secret_server_keys"
        );
        return $token;
    }
}
