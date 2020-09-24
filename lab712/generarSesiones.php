<?php
function generarSesiones($nombreDeSesión)
{
 // controlar si esta sesión está desactivada:
 if(isset($_SESSION['DESACTIVADA']) || $_SESSION['DESACTIVADA'] == true)
 return;
 // desactivar esta sesión en 10 segundos:
$_SESSION['DESACTIVADA'] = true;
$_SESSION['TIEMPO_DE_EXPIRACION'] = time() + 10;
 // generar nueva sesión sin eliminar la sesión desactivada:
 session_regenerate_id(false);
 // guardar nueva ID de sesión nueva y eliminar las dos sesiones:
 $nuevaID = session_id();
 session_write_close();
 // iniciar nueva sesión con nueva ID y nombreDeSesión:
 session_id($nuevaID);
 session_name($nombreDeSesión);
 session_start();
 $_SESSION["ID"] = session_id();
 $_SESSION["NOMBRE_DE_SESION"] = $nombreDeSesión;

 // borrar los siguientes valores de la nueva sesión:
 unset($_SESSION['DESACTIVADA']);
 unset($_SESSION['TIEMPO_DE_EXPIRACION']);
}
// para realizar pruebas añade lo siguiente
// generar sesión para usuario
generarSesiones("usuario");
// mostrar el arreglo SESSION:
print_r($_SESSION);

// generar sesión para administrador:
generarSesiones("admin");
// mostrar el arreglo SESSION:
print_r($_SESSION);
