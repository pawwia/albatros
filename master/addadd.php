<?php
ob_start();
session_start();

require("connect.php");

$name=$_GET["name"];
$surname=$_GET["surname"];

$tel=$_GET["tel"];
$tel2=$_GET["tel2"];

$pesel=$_GET["pesel"];
$email=$_GET["email"];
$od=$_GET["od"];
$do=$_GET["do"];
$house=$_GET["house"];
$mess="";

$id;
if (validate ($name,$surname,$email)==true)
{
	//dodawanie użytkownika
	//sprawdzanie czy juz użytkownik jest
		
		$id=getoradd($conn, $pesel,$name,$surname,$tel,$tel2,$email);
		if ($id>0)
		{
			
	
	addbook($id,$od, $do, $house,$conn,$mess);
	echo @$mess;
	
	
	
}}
ob_end_flush();
?>