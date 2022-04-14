<?php
require("master/connect.php");
session_start();

 if(isset($_SESSION['datefrom'])) {$_SESSION['datefrom']=""; };
 if(isset($_SESSION['dateto'])) {$_SESSION['dateto']=""; };
 if(isset($_SESSION['name'])) {$_SESSION['name']=""; };
 if(isset($_SESSION['surname'])) {$_SESSION['surname']=""; };
 if(isset($_SESSION['tel1'])) {$_SESSION['tel1']=""; };
 if(isset($_SESSION['tel2'])) {$_SESSION['tel2']=""; };
 if(isset($_SESSION['email'])) {$_SESSION['email']=""; };
 if(isset($_SESSION['pesel'])) {$_SESSION['pesel']=""; header("Location: index.html"); };
 
?>