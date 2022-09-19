<?php
session_start();
// servername => localhost
// username => root
// password => empty
// database name => staff
$conn = mysqli_connect("localhost", "dier", "hond69", "dieren");
    
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}
$query = "SELECT * FROM klantenkaart";
$res = $conn->query($query);
?>
<html>
<head>
<title>User Login</title>
<link rel="stylesheet" href="index.css">
</head>
<body>
<nav class="navClass">
        <header><img class="logo" src="img/logo.png"></header>
        <ul>
            <li><a href="out.php" class="login">Log uit</a> </li>
            <li><a href="index.html" class="active">Home</a></li>
        </ul>
    </nav>
    <br>
<?php
if($_SESSION["name"]) {

 if ($res->num_rows > 0) {
     echo
     '
     <table id = "key">
        <tr>
            <th> Voornaam </th>
            <th> Achternaam </th>
        </tr>
     ';
    // output data of each row
    while($row = $res->fetch_assoc()) {
        echo '<tr> <td><a href="/dieren/animal_info.php?id='.$row["ID"].'"/>' . $row["voornaam"] . '</td>' . '<td>' . $row["achternaam"] . '</td></tr>';
    }
  } else {
    echo "0 results";
  }
}
else echo "<h1>Please login first .</h1>";
?>
</body>
</html>