<?php
session_start();
ob_start();
require("connect.php");



?>	
<!DOCTYPE html>

<html lang="pl">
<head>






<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">



<link rel="stylesheet" type="text/css" href="master.css">
<meta charset="UTF-8">
<meta name="author" content="Cheapest Websites">
<title>ADMIN WEBSITE </title>
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
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#" id="closemenu">
                      Admin Panel
                    </a>
                </li>
                <li>
                    <a href="#">Dodaj/Sprawdź</a>
                </li>
                <li>
                    <a href="#">Szukaj</a>
                </li>
                <li>
                    <a href="unlog.php">Wyloguj</a>
                </li>
                <li>
                    <a href="../index.html">Strona główna</a>
                </li>
               
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
		    		                 <a href="#menu-toggle" class="menu" id="menu-toggle">MENU</a>
<div class="lookanal row">
<?php
$house=@ $_GET["house"];
$date=@ $_GET["date"];
$id=@ $_GET["id"];
if (($house>0)AND($date>0)){
$query="SELECT reservations.id,User_ID,Bookfrom,Bookto,house,Status,Edited,price,user,Regtime,Name,Surname,Telephone, Telephone2, Pesel,Email FROM reservations Inner Join user on reservations.User_ID=user.ID WHERE house=\"".$house."\"  AND \"".$date."\" BETWEEN Bookfrom AND Bookto";
$x=mysqli_query($conn,$query);
$all = array("Id rezerwacji: ","Id Usera: ","Domek: ","Od: ","Do: ","Płatność: ","Kto dodał: ","Czas rejstracji: ","ID_uż: ","Imię: ","Nazwisko: ","Telefon: ","Telefon2: ","Pesel: ","Email: ");
if (mysqli_num_rows($x)>0)
{		$bufor=mysqli_fetch_assoc($x);

		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."ID Rezerwacji: "."<z id=\"idres\">".@ $bufor["id"]."</z></div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."ID użytkownika".@ $bufor["User_ID"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Od: ".@ $bufor["Bookfrom"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Do: ".@ $bufor["Bookto"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Domek: ".@ $bufor["house"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Status: ".@ $bufor["Status"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Edytowany: ".@ $bufor["Edited"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Do zapłaty: ".@ $bufor["price"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Kto rejstrował: ".@ $bufor["User"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Czas rejstracji: ".@ $bufor["Regtime"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Imię: ".@ $bufor["Name"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Nazwisko: ".@ $bufor["Surname"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Telefon: ".@ $bufor["Telephone"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Telefon2: ".@ $bufor["Telefon2"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Pesel: ".@ $bufor["Pesel"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Email: ".@ $bufor["Email"]."</div>";

	
	
	
}

else echo "Nie znaleziono";
}
else if ($id>0)
{
	$query="SELECT reservations.id,User_ID,Bookfrom,Bookto,house,Status,Edited,price,user,Regtime,Name,Surname,Telephone, Telephone2, Pesel,Email FROM reservations Inner Join user on reservations.User_ID=user.ID WHERE reservations.ID=".$id;
$x=mysqli_query($conn,$query);
$all = array("Id rezerwacji: ","Id Usera: ","Domek: ","Od: ","Do: ","Płatność: ","Kto dodał: ","Czas rejstracji: ","ID_uż: ","Imię: ","Nazwisko: ","Telefon: ","Telefon2: ","Pesel: ","Email: ");
if (mysqli_num_rows($x)>0)
{		$bufor=mysqli_fetch_assoc($x);

		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."ID Rezerwacji: "."<z id=\"idres\">".@ $bufor["id"]."</z></div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."ID użytkownika".@ $bufor["User_ID"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Od: ".@ $bufor["Bookfrom"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Do: ".@ $bufor["Bookto"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Domek: ".@ $bufor["house"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Status: ".@ $bufor["Status"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Edytowany: ".@ $bufor["Edited"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Do zapłaty: ".@ $bufor["price"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Kto rejstrował: ".@ $bufor["User"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Czas rejstracji: ".@ $bufor["Regtime"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Imię: ".@ $bufor["Name"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Nazwisko: ".@ $bufor["Surname"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Telefon: ".@ $bufor["Telephone"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Telefon2: ".@ $bufor["Telefon2"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Pesel: ".@ $bufor["Pesel"]."</div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Email: ".@ $bufor["Email"]."</div>";

	
	
	
}

else echo "Nie znaleziono";
	 
	
}

?>
<button id="edit" class="butony col-lg-4 col-xs-12" >Edytuj</button>
<button id="szukaj" class="butony col-lg-4 col-xs-12" >Szukaj</button>
<button id="pay" class="butony col-lg-4 col-xs-12" >Płać</button>
<button id="cancel" class="butony col-lg-12 col-xs-12" >anuluj</button>

</div>
				
        </div>
        <!-- /#page-content-wrapper -->

    </div>
     
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>

     
		
		 <script>
    $("#menu-toggle, #closemenu").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
	
$("#pay").click(function(){
	
	var id=parseInt($("#idres").html());
	window.location.href ='adminpay.php?id='+id;
	
});
$("#edit").click(function(){
	
	var id=parseInt($("#idres").html());
	window.location.href = 'adminedit.php?id='+id;
	
});
$("#szukaj").click(function(){
	
	var id=parseInt($("#idres").html());
	window.location.href = 'adminsearch.php';
	
});
$("#cancel").click(function(){
	
	var id=parseInt($("#idres").html());
	window.location.href = 'admincancel.php?id='+id;
	
});

	
    </script>
	
	<?php
 }else header("Location:../master.php");
	ob_end_flush();
	?>
</body>




</html>
<?php
ob_end_flush();
	?>