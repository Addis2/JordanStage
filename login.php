<?php
    require 'dbconnect.php';
    session_start();
    $message="";
    if(count($_POST)>0) {
        $query = "SELECT * FROM `Jordan` WHERE `gebruiksnaam` = '".$_POST["gebruikersnaam"]."' AND `wachtwoord` = '".$_POST["wachtwoord"]."'";
        $result = mysqli_query($db_connect, $query);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $_SESSION["ID"] = $row['ID'];
            $_SESSION["name"] = $row['gebruikersnaam'];
        } else {
            $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["ID"])) {
        return header("Location:index.html");
    }
?>