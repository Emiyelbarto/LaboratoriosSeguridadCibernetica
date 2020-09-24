<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    Welcome <?php echo $_GET["uname"]; ?><br>
    Your password is: <?php echo $_GET["psw"]; ?> <br>
    Your encrypted password is: <?php $cifrado = password_hash($_GET["psw"], PASSWORD_DEFAULT); echo $cifrado; ?>

</body>

</html>