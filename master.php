<?php
session_start();
ob_start();
require("master/connect.php");
?>


<!DOCTYPE html>

<html lang="en">
<head>


<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112236920-1"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="master.css">
<meta charset="UTF-8">
<meta name="author" content="Cheapest Websites">
<title>Cheapest websites!  EN </title>
</head>
<body>

<?php


$_SESSION['logged']=$_SESSION['logged'];
$query=mysqli_query($conn,'SELECT user FROM admin');
$results=mysqli_fetch_assoc($query);
$masteruser=$results["user"];

 if($_SESSION['logged']==$masteruser)
 {
	 
	 
 ?>
	 <div class="content">
	<a class="col-lg-6 col-xs-12 kafelek" href="master/adda.php"> Dodaj rezerwacje</a>
	 <a class="col-lg-6 col-xs-12 kafelek" href="master/look.php">Podgląd</a>
	<a  class="col-lg-6 col-xs-12 kafelek" href="index.html">Strona</a>
	<a  class="col-lg-6 col-xs-12  kafelek" href="master/unlog.php"> Wyloguj</a>
	 </div>
 <?php
 }
 
 else {?>

 <div class="askforpass">
 <form method="POST" action="master/login.php" >
 Użytkownik <br><input type="text" name="user"   value="admin" required> <br>
 Hasło<br><input type="password" name="pass"  value="xxx" required><br><br>
 <input type="submit" value="wyślij">
 </form>
 </div>
 
 
 <?php }?>
<script   src=""></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>




</html>
<?php
ob_end_flush();
?>