<?php
ob_start();
session_start();

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
                    <a href="adda.php">Dodaj/Sprawdź</a>
                </li>
                <li>
                    <a href="adminsearch.php">Szukaj</a>
                </li>
                <li>
                    <a href="unlog.php">Wyloguj</a>
                </li>
                <li>
                    <a href="../index.html">Strona główna</a>
                </li>
               
            </ul>
        </div>

    </div>
	
	     
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>

<?php
$id=@ $_GET["id"];
$date=@ $_GET["date"];
$zapytanie = "DELETE FROM `reservations` WHERE `reservations`.`ID` = ".$id."";

	if(mysqli_query($conn,$zapytanie)) {
		echo "Usunąłeś rezerwacje numer ".$id;
		
	} else {
		echo "Wystapił błąd. Proszę spróbować jeszcze raz";
	}

?>

<br>
<input type="button" id="ok" value="ok">

<script>

$("#ok").click(function(){
	
	window.location.href = 'adda.php';
	
});

</script>

</body>
</html>