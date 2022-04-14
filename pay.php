<?php
ob_start();
session_start();

require("master/connect.php");
?>


<!DOCTYPE html>

<html lang="pl">
<head>
<link rel="stylesheet" type="text/css" href="pay.css">


<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="datapicker/style.css">
<link  href="datapicker2/dist/css/hotel-datepicker.css" rel="stylesheet">
<script src="datapicker2/fech/fecha-master/fecha.js"></script>
<script src="datapicker2/dist/js/hotel-datepicker.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112236920-1"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<meta charset="UTF-8">
<meta name="author" content="Cheapest Websites">
<title>Cheapest websites!  EN </title>
</head>
<body>

<?php

$datefrom=$_SESSION["od"];
$dateto=$_SESSION["do"];
$name=$_SESSION['name'];
$surname=$_SESSION["surname"];
$tel1=$_SESSION["tel1"];
$tel2=$_SESSION["tel2"];
$email=$_SESSION["email"];
$pesel=$_SESSION["pesel"];


$datebuforfrom= explode("/",$_SESSION['od']);
$datebuforto= explode("/",$_SESSION['do']);
$_SESSION['datefrom']=$datebuforfrom[0]."-".$datebuforfrom[1]."-".$datebuforfrom[2];
$_SESSION['dateto']=$datebuforto[0]."-".$datebuforto[1]."-".$datebuforto[2];


?>

	

	<h1> Ezamówienie  </h1>
	
	<div class="new-reservation"> 
		 Nowa Rezerwacja
	</div>
	<br>
	<div id="pod" style="margin-left: 10%;">Podsumowanie rezerwacji</div>
	
	<div class="block-of-reservation" style="padding-left: 2%; padding-top: 15px;  padding-bottom: 15px;">
		<div class="dane">
			<table>
				<tr>
					<td  style="padding-top: 7px; padding-bottom: 7px;"> imię </td> 
					<td style="width: 60%"></td>
					<td  style="padding-top: 7px; padding-bottom: 7px;"><?php echo $_SESSION['name']; ?></td>
				</tr>
				<tr>
					<td  style="padding-top: 7px; padding-bottom: 7px;"> Nazwisko </td> 
					<td style="width: 60%"></td>
					<td  style="padding-top: 7px; padding-bottom: 7px;"><?php echo $_SESSION['surname']; ?></td>
				</tr>
				<tr>
					<td  style="padding-top: 7px; padding-bottom: 7px;"> Telefon </td> 
					<td style="width: 60%"></td>
					<td  style="padding-top: 7px; padding-bottom: 7px;"><?php echo $_SESSION['tel1']; ?></td>
				</tr>
				<tr>
					<td  style="padding-top: 7px; padding-bottom: 7px;"> Telefon 2 </td> 
					<td style="width: 60%"></td>
					<td  style="padding-top: 7px; padding-bottom: 7px;"><?php echo $_SESSION['tel2']; ?></td>
				</tr>
				<tr>
					<td  style="padding-top: 7px; padding-bottom: 7px;"> email </td> 
					<td style="width: 60%"></td>
					<td  style="padding-top: 7px; padding-bottom: 7px;"><?php echo $_SESSION['email']; ?></td>
				</tr>
				<tr>
					<td  style="padding-top: 7px; padding-bottom: 7px;"> od </td> 
					<td style="width: 60%"></td>
					<td  style="padding-top: 7px; padding-bottom: 7px;"><?php echo $_SESSION['od']; ?></td>
				</tr>
				<tr>
					<td  style="padding-top: 7px; padding-bottom: 7px;"> do </td> 
					<td style="width: 60%"></td>
					<td  style="padding-top: 7px; padding-bottom: 7px;"><?php echo $_SESSION['do']; ?></td>
				</tr>
				<tr>
					<td  style="padding-top: 7px; padding-bottom: 7px; border-bottom: 0px;"> PESEL </td> 
					<td style="width: 60%;  border-bottom: 0px;"></td>
					<td  style="padding-top: 7px; padding-bottom: 7px; border-bottom: 0px;"><?php echo $_SESSION['pesel']; ?></td>
				</tr>
			</table>
			
			
			<!--
			
			<div class="row" style="margin-bottom: 20px;">
				<div class="elemkal col-lg-8 col-xs-12">Imię: <?php echo $_SESSION['name']; ?>></div>
				<div class="elemkal col-lg-8 col-xs-12">nazwisko: <?php echo $_SESSION['surname']; ?></div>
				<div class="elemkal col-lg-8 col-xs-12">telefon 1: <?php echo $_SESSION['tel1']; ?></div>
				<div class="elemkal col-lg-8 col-xs-12">telefon 2: <?php echo $_SESSION['tel2']; ?></div>
				<div class="elemkal col-lg-8 col-xs-12">Data przyjazdu: <?php echo $_SESSION['od']; ?></div>
				<div class="elemkal col-lg-8 col-xs-12">Data wyjazdu: <?php echo $_SESSION['do']; ?></div>
				<div class="elemkal col-lg-8 col-xs-12">PESEL: <?php echo $_SESSION['do']; ?></div>
			
			
		
			
			</div>
			
			-->
			
		</div>
		
		<div class="block-of-choose">
			<input type="button" value="Potwierdz zamówienie" onclick="ok()"> <br><br>
			<input type="button" value="edytuj" onclick="edytuj()"> <br><br>
			<input type="button" value="anuluj" onclick="anuluj()"> 
		</div>
	</div>
	
	<div class="pay">
		<h1> Wybierz sposób płatności </h1>
	
		
		<form action="paysubmit.php" method="post">
			<input type="radio" name="met" value="1"><img style="width:120px; height:80px;" src="img/logo_dotpay.jpg">
			<input type="hidden" name="name" value="<?php echo $_SESSION['name']; ?>">
			<input type="hidden" name="surname" value="<?php echo $_SESSION['surname']; ?>">
			<input type="hidden" name="tel1" value="<?php echo $_SESSION['tel1']; ?>">
			<input type="hidden" name="tel2" value="<?php echo $_SESSION['tel2']; ?>">
			<input type="hidden" name="od" value="<?php echo $_SESSION['od']; ?>">
			<input type="hidden" name="do" value="<?php echo $_SESSION['do']; ?>">
			<input type="hidden" name="pesel" value="<?php echo $_SESSION['pesel']; ?>">
			<input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">

			<input type="submit" value="Opłać zamówienie">
		</form>
	</div>
	

<script	  src="pay.js"> </script>
<script   src="rezerwacja.js"></script>
<script   src="script.js"></script>
<script   src="jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="gallery-files/style.css" />
<script src="gallery-files/script.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>

</html>
<?php
ob_end_flush();
?>