<?php
session_start();
ob_start();					

require("connect.php");


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
<?php

$_SESSION['logged']=$_SESSION['logged'];
$query=mysqli_query($conn,'SELECT user FROM admin');
$results=mysqli_fetch_assoc($query);
$masteruser=$results["user"];

 if($_SESSION['logged']==$masteruser)
 {
	 
	 
 ?>
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
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
		    		                 <a href="#menu-toggle" class="menu" id="menu-toggle">MENU</a>
<div class="lookanal row">

<?php
$id=$_GET["id"];
if ($id>0)
{
	$query="SELECT ID,price FROM reservations WHERE ID=".$id;
	$x= mysqli_query($conn, $query);
	if (mysqli_num_rows($x)>0)
	{
		$bufor=mysqli_fetch_assoc($x);
		echo "Procedura zmiany wartości zapłaconej kwoty. Wpisz ile musi zapłacić płatnik i naciśnij Zaktualizuj. Pamiętaj o minusie. </br> ID nr:".$bufor["ID"]."--><input style=\"color:black;\" id=\"getprice\" type=\"number\" value=\"".$bufor["price"] ."\"><input type=\"button\" onclick=\"updateprice(".$bufor["ID"].")\" style=\"color:black;\" value=\"Zaktualizuj\"";
	}
	
	else echo "Błąd bazy danych.";
	
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
	$(".result").load("adminpayexe.php?id="+id+"&val="+newone);
		
		
	}
	
    </script>
	<?php
 }else header("Location:../master.php");
	?>
</body>




</html>
<?php ob_end_flush();
	?>