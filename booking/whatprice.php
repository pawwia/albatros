<?php
ob_start();
session_start();

require("../master/connect.php");
$od=$_GET["od"];
$do=$_GET["do"];
$dni=iledni($od,$do);
$stawka=getstawka($conn);
$all=$dni*$stawka;

echo $all;
ob_end_flush();
?>