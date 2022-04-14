<?php
ob_start();
session_start();

require("master/connect.php");
?>


<!DOCTYPE html>

<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="style.css">


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

<style type="text/css">
.form-style-5{
    max-width: 500px;
    padding: 10px 20px;
    background: #f4f7f8;
    margin: 10px auto;
    padding: 20px;
    background: rgba(0,0,0,0.5);
    border-radius: 8px;
    font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
    border: none;
}
.form-style-5 legend {
    font-size: 1.4em;
    margin-bottom: 10px;
}
.form-style-5 label {
    display: block;
    margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 input[type="date"],
.form-style-5 input[type="datetime"],
.form-style-5 input[type="email"],
.form-style-5 input[type="number"],
.form-style-5 input[type="search"],
.form-style-5 input[type="time"],
.form-style-5 input[type="url"],
.form-style-5 textarea,
.form-style-5 select {
    font-family: Georgia, "Times New Roman", Times, serif;
    background: rgba(255,255,255,.1);
    border: none;
    border-radius: 4px;
    font-size: 16px;
    margin: 0;
    outline: 0;
    padding: 7px;
    width: 100%;
    box-sizing: border-box; 
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box; 
    background-color: #e8eeef;
    color:#8a97a0;
    -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    margin-bottom: 30px;
    
}
.form-style-5 input[type="text"]:focus,
.form-style-5 input[type="date"]:focus,
.form-style-5 input[type="datetime"]:focus,
.form-style-5 input[type="email"]:focus,
.form-style-5 input[type="number"]:focus,
.form-style-5 input[type="search"]:focus,
.form-style-5 input[type="time"]:focus,
.form-style-5 input[type="url"]:focus,
.form-style-5 textarea:focus,
.form-style-5 select:focus{
    background: #d2d9dd;
}
.form-style-5 select{
    -webkit-appearance: menulist-button;
    height:35px;
}
.form-style-5 .number {
    background: #1abc9c;
    color: #fff;
    height: 30px;
    width: 30px;
    display: inline-block;
    font-size: 0.8em;
    margin-right: 4px;
    line-height: 30px;
    text-align: center;
    text-shadow: 0 1px 0 rgba(255,255,255,0.2);
    border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type="submit"],
.form-style-5 input[type="button"]
{
    position: relative;
    display: block;
    padding: 19px 39px 18px 39px;
    color: #E0C020;
    margin: 0 auto;
    background: rgba(0,0,0,0.4);;
    font-size: 18px;
    text-align: center;
    font-style: normal;
    width: 100%;
    border: 1px solid #E0C020;
    border-width: 1px 1px 3px;
    margin-bottom: 10px;
}
.form-style-5 input[type="submit"]:hover,
.form-style-5 input[type="button"]:hover
{
    background: #E0C020;
	color: #FFF;
}
</style>

</head>
<body>

<div class="main-reservation">
	<div class="title-reservation">
		<div class="name-company">
			Albatros międzywodzie
		</div>
		sadasdas
	</div>
	
	<div class="termin">
		<div class="kalendarz-termin">
				<h1> kliknij i wprowadz date </h1>
				<form name="data" method="GET">
					<input id="input-id" type="text" value='<?php if(!empty($_SESSION['datefrom']) && !empty($_SESSION['dateto'])) {echo $_SESSION['datefrom']." "."-"." ".$_SESSION['dateto'] ;}else {}?>'>
					<script>
					var hdpkr = new HotelDatepicker(document.getElementById('input-id'), );
					</script><br><br>
					<input type="button" onclick="checkdate()"  id="sprawdz" value="sprawdz date">
				</form>	
		</div>			
					<div id="alert1"></div>
	</div>
	
					<div class="failed-reservation">Niestety Nie znaleźliśmy miejsca w podanym terminie ;( Zobacz na dostępne terminy w kalendarzu poniżej i spróbuj inną datę.</div>
					<div class="failed-reservation2">
					</div>

					<div class="block-reservation">
					<div class="main-block-reservation">
						<h1 style="text-align: center; margin-bottom: 20px; margin-top: 20px;"> Gratulacje! Podany termin jest wolny. </h1>
					
							<form class="form-style-5">	
							<!--	<table>
								<tr>
								<Td>Imie</td>
								<td style="width: 25px"></td>
								<td><input type="tekst" name="name" id="name" placeholder="imie" style="margin-bottom: 10px;" 
								value='<?php if(isset($_SESSION['name'])) {echo $_SESSION['name'];}?>'></td>
								<td style="width: 150px"></td>
								<Td>Nazwisko</td>
								<td style="width: 25px"></td>
								<td><input type="tekst" id="surname" name="surname" placeholder="nazwisko"
								value='<?php if(isset($_SESSION['surname'])) {echo $_SESSION['surname'];}?>'></td>
								</tr>
								<tr>
								
								<Td>Telefon</td>
								<td style="width: 25px"></td>
								<td><input type="tekst" name="tel" id="tel" placeholder="telefon" style="margin-bottom: 10px;"
								value='<?php if(isset($_SESSION['tel1'])) {echo $_SESSION['tel1'];}?>'></td>
								<td style="width: 150px"></td>
								<Td>Telefon 2</td>
								<td style="width: 25px"></td>
								<td><input type="tekst" name="tel2"  id="tel2" placeholder="telefon 2"
								value='<?php if(isset($_SESSION['tel2'])) {echo $_SESSION['tel2'];}?>'></td>
								</tr>
								<tr>
								
								<Td>E-mail</td>
								<td style="width: 25px"></td>
								<td><input type="tekst" id="email" name="email" placeholder="email" style="margin-bottom: 10px;"
								value='<?php if(isset($_SESSION['email'])) {echo $_SESSION['email'];}?>'></td>
								<td style="width: 150px"></td>
								<Td>Pesel</td>
								<td style="width: 25px"></td>
								<td><input type="tekst" name="pesel" id="pesel" placeholder="pesel"
								value='<?php if(isset($_SESSION['pesel'])) {echo $_SESSION['pesel'];}?>'></td>
								</tr>
									<!--<tr>
										
										<Td>Telefon 2</td>
										<td style="width: 25px"></td>
										<td><input type="tekst" name="imie" style="margin-bottom: 10px;"></td>
										<td style="width: 150px"></td>
										<Td>Imie</td>
										<td style="width: 25px"></td>
										<td><input type="tekst" name="name"></td>
									</tr>---
								</table>
								-->
								<div class="row">
								<div class="elemkal col-lg-6 col-xs-12">Imię: <input type="tekst" name="name" id="name" placeholder="imie" style="marfgin-bottom: 10px;" 
								value='<?php if(isset($_SESSION['name'])) {echo $_SESSION['name'];}?>'></div>
								<div class="elemkal col-lg-6 col-xs-12">Nazwisko: <input type="tekst" id="surname" name="surname" placeholder="nazwisko"
								value='<?php if(isset($_SESSION['surname'])) {echo $_SESSION['surname'];}?>'></div>
								<div class="elemkal col-lg-6 col-xs-12">Telefon: <input type="tekst" name="tel" id="tel" placeholder="telefon" style="mafrgin-bottom: 10px;"
								value='<?php if(isset($_SESSION['tel1'])) {echo $_SESSION['tel1'];}?>'></div>
								<div class="elemkal col-lg-6 col-xs-12">Telefon2: <input type="tekst" name="tel2"  id="tel2" placeholder="telefon 2"
								value='<?php if(isset($_SESSION['tel2'])) {echo $_SESSION['tel2'];}?>'></div>
								<div class="elemkal col-lg-6 col-xs-12">E-mail: <input type="tekst" id="email" name="email" placeholder="email" style="fmargin-bottom: 10px;"
								value='<?php if(isset($_SESSION['email'])) {echo $_SESSION['email'];}?>'></td>
								<td style="width: 150px"></div>
								<div class="elemkal col-lg-6 col-xs-12">Pesel: <input type="tekst" name="pesel" id="pesel" placeholder="pesel"
								value='<?php if(isset($_SESSION['pesel'])) {echo $_SESSION['pesel'];}?>'></div>

								
								
								
								</div> 
								
								<div class="col-lg-12 col-xs-12 sum" >Do zapłaty: <z id="suma"></z> PLN</div>

								<input type="button" id="book" name="book" value="Rezerwuj!" onclick="trytobook()">
							</form>

		</div>
	</div>

</div>
<div class="none" id="whichhouse"></div>

<div class="none" id="allhidden">
<div class="none" id="d1"></div>
<div class="none" id="d2"></div>
<div class="none" id="d3"></div>
<div class="none" id="d4"></div>
<div class="none" id="d5"></div>
<div class="none" id="d6"></div>
</div>

<script   src="rezerwacja.js"></script>
<script	  src="pay.js"> </script>
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
ob_end_flush();?>