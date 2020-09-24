<?php

session_start();
require_once('autoload.php');
$client_id = '419940684703-jgm2eu2t89v757k2ahtl4git32k2pfmi.apps.googleusercontent.com';
$client_secret = 'f9Cs-J2TX_Qji0rLHSvKYu9k';
$redirect_uri = 'http://localhost/session/form.php';
if (isset($_GET['logout'])) {
    unset($_SESSION['access_token']);
}
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");
$service = new Google_Service_Oauth2($client);
if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    $redirect =
        'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    header('Location: ' . filter_var(
        $redirect,
        FILTER_SANITIZE_URL
    ));
    exit;
}
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
    $usuario = $service->userinfo->get();
    $nombre = $usuario->name;
    $foto = $usuario->picture;
    $correoE = $usuario->email;
    print "Nombre: {$nombre} <br>";
    print "Foto: {$foto} <br>";
    print "correoE: {$correoE} <br>";
} else {
    $authUrl = $client->createAuthUrl();
    echo '<a class="login" href="' . $authUrl . '">
<img src="images/google-login-button.png" /></a>';
}
