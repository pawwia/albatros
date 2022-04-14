
<?php

require("connect.php");
session_start();
@$_SESSION["wol"];

?>
<!DOCTYPE html>

<html lang="en">
<?php 
$_SESSION['logged']=$_SESSION['logged'];
$query=mysqli_query($conn,'SELECT user FROM admin');
$results=mysqli_fetch_assoc($query);
$masteruser=$results["user"];
if($_SESSION['logged']==$masteruser)
 {
?>
<head>

    <link href="../pmu/styles/glDatePicker.default.css" rel="stylesheet" type="text/css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112236920-1"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="../jquery/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../master.css">
<meta charset="UTF-8">
<meta name="author" content="Cheapest Websites">
<title>Cheapest websites!  EN </title>
</head>
<body>
<div class="addall">
<div class="paneladd">

<div id="dodaj" style="color: black;">

	<h1 style="color: white;">Dodaj/Usun	<a href="unlog.php"> Wyloguj</a>
</h1>
	<hr>
	
	<h3 style="color: white;">Wybierz domek</h3>
	<form method="POST">
		<select id="choosehouse" name="n1" style="color: black;">
		<option value="">--</option>
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
<div id="addme">



<div class="left">
<form method="POST"  id="personal" style="display:none">
Imię:<br><input type="text" name="name" value="Adam" required><br>
Nazwisko:<br><input type="text" name="surname" value="Asnyk" required><br>
Telefon:<br><input type="text" name="tel" value="663222222"  required><br>
Telefon 2 :<br><input type="text" name="tel2"><br>

Pesel:<br><input type="text" name="pesel" value="12312312311" required><br>
Email:<br><input type="text" name="email" value="Adam@gmail.com" required><br>
Pobyt od <br> <input type="text" name="od" id="od" value="2018/04/01" class="single" gldp-id="od"><br>
<div gldp-el="od" style="width:210px; height:150px; position:static; top:70px; left:100px;"></div></br></br>
Pobyt do <br> <input type="text" name="do" id="do" value="2018/04/20" gldp-id="do"><br> 
<div gldp-el="do" style="width:210px; height:150px; position:static; margin-bottom:10px;;"></div>
<input style="display:none" id="zasab" type="button" onclick="getit()" value="Zarejstruj w bazie danych!">
<input  type="button" onclick="validate()" value="Sprawdź terminy">


</form>
</div>
<div class="right" id="right" ></div>




</div>

</div>


<!----- Form code begins 
    <form method="post">
      <div class="form-group">  Date input 
        <label class="control-label" for="date">Date</label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
      </div>
      <div class="form-group"> Submit button 
        <button class="btn btn-primary " name="submit" type="submit">Submit</button>
      </div>
     </form>
     Form code ends ---->
<script>
var hs;
$('#choosehouse').change(function(){

var house=$(this).val();
 hs=house;
 /*
 var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("addme").innerHTML = this.responseText;
    }
  };
 
  xhttp.open("GET", "getadded.php?house="+house, true);
  xhttp.send();
*/
$("#personal").slideDown();


});
function validate(){
	var name=document.getElementById("personal").name.value;
	var surname=document.getElementById("personal").surname.value;
	var tel=document.getElementById("personal").tel.value;
	var tel2=document.getElementById("personal").tel2.value;
	var pesel=document.getElementById("personal").pesel.value;
	var email=document.getElementById("personal").email.value;
	var od=document.getElementById("personal").od.value;
	var do1=document.getElementById("personal").do.value;
	var tab=od.split(".");
	var od=tab[2]+"/"+tab[1]+"/"+tab[0];
	var tab1=do1.split(".");
	var do1=tab1[2]+"/"+tab1[1]+"/"+tab1[0];
	if(tab[0]==null||tab[1]==null||tab[2]==null||tab1[0]==null||tab1[1]==null||tab1[2]==null)
	{
		alert("Błędnie podana data");
		return false;
		
		
	}
	if (tab[2]>tab1[2])
	{
		alert("Błędnie podana data");
		return false;
	}
	if (tab[2]==tab1[2]&&tab[1]>tab1[1])
	{
		alert("Błędnie podana data");
		return false;
	}
	if (tab[2]==tab1[2]&&tab[1]==tab1[1]&&tab[0]>tab1[0])
	{
		alert("Błędnie podana data");
		return false;
	}
	


 var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("right").innerHTML = this.responseText;
    }
  };
 
  xhttp.open("GET", "checkdate.php?dstart="+od+"&dstop="+do1+"&house="+hs, true);
  xhttp.send();
  slidown();

  
  
  
  

	
	
	
}
function slidown()
{
  if ( 1)
  {
$("#od").prop('disabled', true);
  $("#do").prop('disabled', true);
  $("#zasab").slideDown();
	 $_SESSION["wol"]=0; 
  }
	
	
}
function getit(){
	var name=document.getElementById("personal").name.value;
	var surname=document.getElementById("personal").surname.value;
	var tel=document.getElementById("personal").tel.value;
	var tel2=document.getElementById("personal").tel2.value;
	var pesel=document.getElementById("personal").pesel.value;
	var email=document.getElementById("personal").email.value;
	var od=document.getElementById("personal").od.value;
	var do1=document.getElementById("personal").do.value;
var tab=od.split(".");
	var od=tab[2]+"/"+tab[1]+"/"+tab[0];
	var tab1=do1.split(".");
	var do1=tab1[2]+"/"+tab1[1]+"/"+tab1[0];
	
	var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("addme").innerHTML = this.responseText;
    }
  };
 

  xhttp.open("GET", "addadd.php?name="+name+"&surname="+surname+"&tel="+tel+"&tel2="+tel2+"&pesel="+pesel+"&email="+email+"&od="+od+"&do="+do1+"&house="+hs, true);
  xhttp.send();

	
	
	
}

</script>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../pmu/glDatePicker.min.js"></script>
   
    <script type="text/javascript">
	var d = new Date();
var year = d.getFullYear();
var day=d.getDate()
var month=d.getMonth();


        $(window).load(function()
        {
            $("#od, #do").glDatePicker(
			
			{
				selectableDateRange: [
			{ from: new Date(year, month, day), to: new Date(year+1, month, day) },	],}
				

			);
			
			
					
        });
		
		
		
		 /* $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })*/
    </script>

 

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
 <?php
 }
 else header("Location:../master.php"); ?>

</html>

