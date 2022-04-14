
<?php
require("connect.php");
session_start();?>


<!DOCTYPE html>

<html lang="en">
<head>


<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112236920-1"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="../jquery/jquery-3.2.1.min.js"></script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../master.css">
<meta charset="UTF-8">
<meta name="author" content="Cheapest Websites">
<title>Cheapest websites!  EN </title>
</head>
<body>

<div class="paneladd">

<div id="dodaj" style="color: black;">

	<h1 style="color: white;">Dodaj/Usun</h1>
	<hr>
	
	<h3 style="color: white;">Wybierz domek</h3>
	<form method="POST">
		<select id="choosehouse" name="n1" style="color: black;">
		<?php 
		$x=mysqli_query($conn, "SELECT `Number` FROM house" );
		while(($bufor=mysqli_fetch_assoc($x)))
		{
			echo "<option value=\"".$bufor["Number"]."\">".$bufor["Number"]."</option>";
			
			
		}
		?>
		</select>
</form>
	
</div>
<div id="addme"></div>

</div>



<script>

$('#choosehouse').change(function(){
var house=$(this).val();
 
 var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("addme").innerHTML = this.responseText;
    }
  };
 
  xhttp.open("GET", "getadded.php?house="+house, true);
  xhttp.send();



})

</script>

<script   src="kalendarz.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
</html>


