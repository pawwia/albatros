<?php
ob_start();
session_start();
require("connect.php");

$userid=$_GET["userid"];
$house=$_GET["house"];

$id=$_GET["id"];
$od=$_GET["bfrom"];
$do=$_GET["bto"];
$name=$_GET["name"];
$surname=$_GET["surname"];
$tel1=$_GET["tel"];
$tel2=$_GET["tel2"];
$email=$_GET["email"];
$pesel=$_GET["pesel"];

$valnam = '/^[A-Za-ząćęłńóśźżĄĆĘŁŃÓŚŹŻ\- ]+$/';
$valmail = '/^([A-Za-z0-9ąćęłńóśźżĄĆĘŁŃÓŚŹŻ_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,8})$/';

if(preg_match($valnam, $name)) 
{
   if(preg_match($valnam, $surname))
      if(preg_match($valmail, $email))
  if ( strlen($tel1) == 9 && is_numeric($tel1) ) {
	  
	   if (preg_match('/^[0-9]{11}$/',$pesel)) {
		   
		   if (($od[4]=="-")&&($od[7]=="-")&&($do[4]=="-")&&($do[7]=="-"))
		   {
		   
		   $dozaplaty=getstawka($conn)*iledni($od,$do)*-1;
		   
		   
		   $subquer="SELECT `Bookfrom`,`Bookto` from reservations WHERE ID=".$id;
	  $xd=mysqli_query($conn, $subquer);
	  $xd2=mysqli_fetch_assoc($xd);
		   
		   if (($xd2["Bookfrom"]==$od)&&($xd2["Bookto"]==$do))
		  
		  {
	  $query="UPDATE `reservations` SET `House`=\"".$house."\",`Status`=\"1\",`Edited`=\"1\" ,`price`=\"".$dozaplaty."\",`User`=\"admin\" WHERE ID=".$id;
		  $query2="UPDATE `user` SET `Name`=\"".$name."\",`Surname`=\"".$surname."\",`Telephone`=\"".$tel1."\",`Telephone2`=\"".$tel2."\",`Pesel`=\"".$pesel."\",`Email`=\"".$email."\" WHERE ID=".$userid;

		  
		  if (($x=mysqli_query($conn, $query))&&($z=mysqli_query($conn, $query2)))
				{
				  echo "<div style='width:100%; min-height:50px; background-color:green; color:white; font-size:250%;;text-align:center;'>Pomyślnie zaktualizowano bazę danych</div>";

					
				}
			  else echo "<div style=\"width:100%; min-height:50px; background-color:red; color:white; font-size:250%;text-align:center;\">NIE UDAŁO SIĘ ZMIENIĆ!!</div>";
		  
			  
		  }
		  else if(czywolne($od, $do, $house)==true)
		  {
	  
		$query="UPDATE `reservations` SET `House`=\"".$house."\",`Bookfrom`=\"".$od."\",`Bookto`=\"".$do."\",`Status`=\"1\",`Edited`=\"1\" ,`price`=\"".$dozaplaty."\",`User`=\"admin\" WHERE ID=".$id;
		  $query2="UPDATE `user` SET `Name`=\"".$name."\",`Surname`=\"".$surname."\",`Telephone`=\"".$tel1."\",`Telephone2`=\"".$tel2."\",`Pesel`=\"".$pesel."\",`Email`=\"".$email."\" WHERE ID=".$userid;
				
				if (($x=mysqli_query($conn, $query))&&($z=mysqli_query($conn, $query2)))
				{
				  echo "<div style='width:100%; min-height:50px; background-color:green; color:white; font-size:250%;text-align:center;'>Pomyślnie zaktualizowano bazę danych</div>";

					
				}
			  else echo "<div style=\"width:100%; min-height:50px; background-color:red; color:white; font-size:250%;text-align:center;\">NIE UDAŁO SIĘ ZMIENIĆ!!</div>";
		  
		  }
		  
		
		  
		  
		  
		  
		  
		   
		   	  //jesli wszystko poprawnie zwalidowane
		   }
		   else echo "Niepoprawne daty";
		   
	   }
	   else echo "Zły pesel";
	  
	  
} else {
          echo 'Zły numer telefonu';

}
else
  echo 'Adres e-mail nieprawidłowy';
   else
      echo "Błędne nazwisko.";
}
else 
   echo "Błędne imię.";



ob_end_flush();

?>



 