<?php
ob_start();
session_start();
require("connect.php");

$_SESSION["logged"]=NULL;
header("Location:../master.php");
ob_end_flush();
?>