<?php
include_once("jwt_helper.php");

class IdC extends JWT
{
    protected $credencialesDelPortador = "";
    protected $tokenDelPortador = "";
    public function __construct(
        $tokenDelPortador,
        $credencialesDelPortador
    ) {
        $this->tokenDelPortador = $tokenDelPortador;
        $this->credencialesDelPortador = $credencialesDelPortador;
    }
    public function decodeToken()
    {
        $decoded = JWT::decode(
            $this->tokenDelPortador,
            'secret_server_keys'
        );
        if (($decoded->aplicación ==
                $this->credencialesDelPortador['aplicación']) &&
            ($decoded->contraseña ==
                $this->credencialesDelPortador['contraseña']) &&
            ($decoded->caducidad > time())
        ) {
            return true;
        } else {
            return false;
        }
    }
}
