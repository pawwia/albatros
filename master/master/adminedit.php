					<?php
require("connect.php");
session_start();


?>	<!DOCTYPE html>

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
$id=$_GET["id"];
if ($id>0)
{
$query="SELECT reservations.id,User_ID,Bookfrom,Bookto,house,Status,Edited,price,user,Regtime,Name,Surname,Telephone, Telephone2, Pesel,Email FROM reservations Inner Join user on reservations.User_ID=user.ID WHERE reservations.ID=".$id;
$x=mysqli_query($conn,$query);
$all = array("Id rezerwacji: ","Id Usera: ","Domek: ","Od: ","Do: ","Płatność: ","Kto dodał: ","Czas rejstracji: ","ID_uż: ","Imię: ","Nazwisko: ","Telefon: ","Telefon2: ","Pesel: ","Email: ");
if (mysqli_num_rows($x)>0)
{		$bufor=mysqli_fetch_assoc($x);

		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."ID Rezerwacji: "."<z id=\"idres\">".@ $bufor["id"]."</z></div>";//zostaje
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."ID użytkownika: <input type=\"text\" style=\"background-color:grey;\" disabled value=\"".@ $bufor["User_ID"]."\"></div>";//zostaje
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Od: <input type=\"text\" id=\"bookfrom\" value=\" ". @$bufor["Bookfrom"]."\"></div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Do: <input type=\"text\" id=\"bookto\" value=\" ". @$bufor["Bookto"]."\"></div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Domek: <input type=\"text\" id=\"house\" value=\" ".@ $bufor["house"]."\"></div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Status: <input type=\"text\" style=\"background-color:grey;\" disabled value=\" ".@ $bufor["Status"]."\"></div>";//zostaje
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Edytowany: <input type=\"text\" style=\"background-color:grey;\" disabled value=\"".@ $bufor["Edited"]."\"></div>";//zostaje
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Do zapłaty: <input type=\"text\" style=\"background-color:grey;\" disabled value=\"".@ $bufor["price"]."\"></div>";//zostaje
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Kto rejstrował: <input type=\"text\" style=\"background-color:grey;\" disabled value=\"". @$bufor["User"]."\"></div>";//zostaje
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Czas rejstracji: <input type=\"text\" style=\"background-color:grey;\" disabled value=\"".@ $bufor["Regtime"]."\"></div>";//zostaje
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Imię: <input type=\"text\" id=\"name\" value=\" ". @$bufor["Name"]."\"></div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Nazwisko: <input type=\"text\" id=\"surname\" value=\" ". @$bufor["Surname"]."\"></div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Telefon: <input type=\"text\" id=\"telephone\" value=\" ".@ $bufor["Telephone"]."\"></div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Telefon2: <input type=\"text\" id=\"telefon2\" value=\" ".@ $bufor["Telefon2"]."\"></div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Pesel: <input type=\"text\" id=\"pesel\" value=\" ". @$bufor["Pesel"]."\"></div>";
		echo "<div class=\"lookelement col-lg-6 col-xs-12>\">"."Email: <input type=\"text\" id=\"email\" value=\" ". @$bufor["Email"]."\"></div>";

	
	
	
}

else echo "Nie znaleziono";
	
}

else "Błąd ID";

?>

</div>
				<div class="result"></div> 
		
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
	
	function updateprice(id,price)
	
	{
		
		var newone=$("#getprice").val();
	$(".result").load("admineditsubmit.php?id="+id+"&val="+newone);
		
		
	}
	
    </script>
</body>




</html>