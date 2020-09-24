<?php
session_start();
?>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    Welcome <?php echo $_GET["uname"]; ?><br>
    <?php
    if ($_GET["uname"] == "admin" && $_GET["psw"] == "password")
        $verificado = true;
    else $verificado = false;

    if ($verificado) {
        $_SESSION["ID"] = session_id();
    }
    ?>
    Your session is: <?php echo $_SESSION["ID"]; ?> <br>
</body>

</html>