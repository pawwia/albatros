<?php
session_start();
ob_flush();

require("connect.php");


$_SESSION['logged']=$_SESSION['logged'];
$query=mysqli_query($conn,'SELECT user FROM admin');
$results=mysqli_fetch_assoc($query);
$masteruser=$results["user"];

 if($_SESSION['logged']==$masteruser)
 {
	 
	 
 
$id=$_GET["id"];
$val=$_GET["val"];
$query="UPDATE `reservations` SET `price` =".$val." WHERE `reservations`.`ID` =".$id;
if ($x=mysqli_query($conn,$query))
	echo "<div style=\"color:white; background-color:green; height:30px; width:100%; \">Poprawnie zaktualizowano <a href=\"lookres.php?id=".$id."\">Wróć do rezerwacji</a></div>";
else echo "<div style=\"color:white; background-color:red; height:30px; width:100%; \">Błąd bazy danych</div>";
 }
 else echo "BŁĄD";
 ob_end_flush();
?>	