<?php

require 'config.php';
session_start();
$message="";

if(count($_POST)>0) {

    $db_host = 'localhost';
    $db_user = 'Jordan';
    $db_pass = 'YaredDaniel1126';
    $db_data = 'Datas';

    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_data);
    $username = $_POST["gebruikersnaam"];
    $password = $_POST["wachtwoord"];

    $stmt = $con->prepare("SELECT * FROM Jordan WHERE gebruikersnaam=? AND password=md5(?);");
    $stmt->bind_param("ss", $gebruikernaam, $wachtwoord);
    $stmt->execute();
    $result = $stmt->get_result();


    $result = mysqli_query($mysqli,"SELECT * FROM login_user WHERE gebruikersnaam='" . $_POST["gebruikersnaam"] . "' and wachtwoord = '". $_POST["wachtwoord"]."'");
    $row  = mysqli_fetch_array($result);
    if(is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        $_SESSION["role"] = $row['role'];
        if ($_SESSION["role"] == "admin") {
            header("Location:index.html");

        }
    } else {
        $message = "De gegevens die je hebt ingevuld zijn fout";
    }
}


?>

<html>
<head>
    <title>Usesdasdr Login</title>
</head>
<body>
<form name="frmUser" method="post" action="" align="center">
    <div class="message"><?php if($message!="") { echo $message; } ?></div>
    <div class="div1">

        <h3 align= "center">Vul logingegevens in</h3>
        Gebruikersnaam:<br>
        <input type="text" name="user_name">
        <br>
        Wachtwoord:<br>
        <input type="password" name="password">
        <br><br>
        <input class="button" type="submit" name="submit" value="Submit" class="button">
    </div>
</form>
<style>
    body{
        background-color: antiquewhite;
    }
    .div1{
        background-color: white;
        text-align:center;
        font-size: 30px;
        max-width: 50%;
        box-shadow: 5px 5px black;
        background-color:  #C8BCAC;
    }
    .button{
        background-color: grey;
        height: 40px;
        width: 100px;
        border: 2px solid black;
    }

</style>
</body>
</html>