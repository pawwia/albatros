<?php
session_start();
require("../master/connect.php");
$query= "SELECT MAX(Number) FROM house";
$x= mysqli_query($conn, $query);
$bufor= mysqli_fetch_row($x);
echo $bufor[0];


?>