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
<div class="row userzy" >
<?php
$pesel=$_GET["pesel"]; 
if($pesel)
{
	$query="SELECT reservations.ID, reservations.House, reservations.Bookfrom, reservations.Bookto, reservations.Regtime FROM reservations INNER JOIN `user` on reservations.User_ID=`user`.ID WHERE user.Pesel=".$pesel;
$x=mysqli_query($conn, $query);
if (mysqli_num_rows($x)>0)
{
echo "<div class=\"osoba\">Użytkownik: ".$pesel."</div><br>";
echo "<div class=\"tabelka-users\">";
echo "<div class=\"wiersz\"><div class=\"elmtab\">ID</div><div class=\"elmtab\">Domek</div><div class=\"elmtab\">Od</div><div class=\"elmtab\">Do</div><div class=\"elmtab\">Data rejstracji</div></div>";
while ($bufor=mysqli_fetch_assoc($x))
{
$fun="window.location.href='lookres.php?id=".$bufor["ID"]."'";
echo "<div  class=\"wiersz\"  onclick=\"".$fun."\"			>";
echo "<div class=\"elmtab\">".$bufor["ID"]."</div>" ;
echo "<div class=\"elmtab\">".$bufor["House"]."</div>" ;
echo "<div class=\"elmtab\">".$bufor["Bookfrom"]."</div>" ;
echo "<div class=\"elmtab\">".$bufor["Bookto"]."</div>" ;
echo "<div class=\"elmtab\">".$bufor["Regtime"]."</div>" ;


echo "</div>";

}

echo "</div>";
} else echo "Błąd";}
else echo "Nie znaleziono.";
?>

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
 } else header("Location:../master.php");
 
	?>
</body>




</html>
<?php
 ob_end_flush();
?>