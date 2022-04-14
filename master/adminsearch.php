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
									 <div class="container" >
<div onclick="hideother(1)" id="jed" class="search row">
<h2> Szukanie po dacie i domku </h2>

Data   : <input id="data" type="date" > <br>
Domek: <input type="number" id="house">
<button onclick="search(1)">Szukaj</button>

</div>
<div onclick="hideother(2)" id="dw" class="search row">
<h2> Szukanie po ID</h2>
ID rezerwacji   : <input id="number" type="number" > <br>
<button onclick="search(2)">Szukaj</button>


</div>
<div onclick="hideother(3)" id="trz" class="search row">
<h2> Szukanie po Użytkowniku</h2>
Pesel   : <input id="pesel" type="text" > <br>
<button onclick="search(3)">Szukaj</button>


</div>


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
	
function hideother(num)
{
	switch (num){
	case 1:$("#trz").slideUp("slow");$("#dw").slideUp("slow"); break;
	case 2:$("#jed").slideUp("slow");$("#trz").slideUp("slow"); break;
	case 3:$("#dw").slideUp("slow");$("#jed").slideUp("slow"); break;
	
};}

function search(el)
{
	
	switch (el)
	{
		case 1:var date=$("#data").val(); var house=$("#house").val(); window.location.href="lookres.php?date="+date+"&house="+house;		break;
		case 2: var id=$("#number").val();window.location.href="lookres.php?id="+id;  break;
		case 3: var pesel=$("#pesel").val();  window.location.href="lookbyuser.php?pesel="+pesel;  break;

		
	};
	
	
}
	
    </script>
	<?php
 }else header("Location:../master.php");
	ob_end_flush();
	?>
</body>




</html>