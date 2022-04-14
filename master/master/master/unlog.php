<?php
require("connect.php");
session_start();
$_SESSION["logged"]=NULL;
header("Location:../master.php");

?>