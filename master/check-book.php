<?php
ob_start();
session_start();

require("connect.php");

$wynik = mysqli_query($conn,"SELECT `Bookfrom` FROM `reservations` INNER JOIN house ON reservations.House=house.ID WHERE house.ID=$_SESSION['home_number']");
$wynik2 = mysqli_query($conn,"SELECT `Bookto` FROM `reservations` INNER JOIN house ON reservations.House=house.ID WHERE house.ID=$_SESSION['home_number']");

$_SESSION['is_might_book']= if ((($_SESSION['date_from']<$wynik) && ($_SESSION['date_to']<$wynik2)) || (($_SESSION['date_from']>$wynik) && ($_SESSION['date_to']>$wynik2))) {
	
}
ob_end_flush();
?>