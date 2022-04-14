<?php
session_start();
ob_start();
require("master/connect.php");
$od=$_POST["od"];
$do=$_POST["do"];

$name=$_POST["name"];
$surname=$_POST["surname"];
$tel=$_POST["tel1"];
$pesel=$_POST["pesel"];
$tel2=$_POST["tel2"];
$email=$_POST["email"];
$met=$_POST["met"];
$duser="784457";
$dkwota=getstawka($conn)*iledni ($od, $do);
$dopis=$pesel."//".$od."//".$do."//".$name."//".$surname."//".$tel."//".$tel2."//".$dkwota."//".$email;
$dlan="PL";
if ($name &&$surname && $tel && $pesel && $email && $met)
{
if ($met==1)
{//echo $od. $do;
	//header("Location:https://ssl.dotpay.pl/t2/?id=".$duser."&kwota=".$dkwota.".00&opis=".$dopis."&currency=PLN");
		header("Location:https://ssl.dotpay.pl/test_payment/?id=".$duser."&kwota=".$dkwota.".00&opis=".$dopis."&currency=PLN");

	
}
else echo "WYSTĄPIŁ BŁĄD! Przepraszamy za utrudnienia" ; 
}
else echo "WYSTĄPIŁ BŁĄD! Przepraszamy za utrudnienia" ; 


$_SESSION["od"]="";
$_SESSION["do"]="";
$_SESSION['name']="";
$_SESSION["surname"]="";
$_SESSION["tel1"]="";
$_SESSION["tel2"]="";
$_SESSION["email"]="";
$_SESSION["pesel"]="";

ob_end_flush();
?>