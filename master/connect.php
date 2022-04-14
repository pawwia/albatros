<?php 
/*
$serwer="sql.serwer1854932.home.pl";
$user="26455946_0000001";
$pass="Zawilsk123";
$error="BŁĄD ŁĄCZENIA Z BAZĄ DANYCH. Skontaktuj sie z Administratorem";
$baza="26455946_0000001";
*/

$serwer="mysql1.ugu.pl";
$user="db696053";
$pass="zawilsk123";
$error="BŁĄD ŁĄCZENIA Z BAZĄ DANYCH. Skontaktuj sie z Administratorem";
$baza="db696053";

 $conn= mysqli_connect($serwer,$user,$pass,$baza) or die ("BŁĄD! Skontaktuj się z administratorem");
	global $conn;
	function czywolne($from, $to, $house)
	{global $conn;
		$ok=true;
		$query='SELECT * from reservations WHERE House='.$house;
		$currentdate = strtotime (date('y-md-d'))/3600/24;
		$fun=mysqli_query($conn,$query);
		 $odAsDate=strtotime($from)/3600/24;  //czas w dobach
		 $toAsDate=strtotime($to)/3600/24;
		if($odAsDate<$currentdate) return false; // jeśli początkowa jest mniejsza od dziś
		if($toAsDate<$currentdate) return false; // jeśli końcowa jest mniejsza od dziś
		if($toAsDate<=$odAsDate) return false; // jeśli końcowa jest mniejsza od dziś


		
			while($bufor=mysqli_fetch_assoc($fun))//dopóki są jakieś rezerwacje wykonuj pętle 
			{
				
				$bookfrom=strtotime($bufor["Bookfrom"])/3600/24;
				$bookto=strtotime($bufor["Bookto"])/3600/24;
				for ($i=$odAsDate; $i<$toAsDate;$i++)
				{
				
					for ($z=$bookfrom;$z<=$bookto;$z++)
					{
						if ($z==$i) {return false;}
						
					}
				
				}
				
				
			}			
			
			return true;
		
		
		
		
	}
	
	
	function validate($name,$surname,$email)
	{
		
	

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {//sprawdzanie emaila
  return false;
}
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {//sprawdzanie imienia
 return false;
}
if (!preg_match("/^[a-zA-Z ]*$/",$surname)) {//sprawdzanie nazwiska
 return false;
 }
/*if(!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $tel)) {//sprawdzanie telefonu
    return false
}*/
		
		return true;
	}
	
	
	
	function getoradd($conn, $pesel,$name,$surname,$tel1,$tel2,$email)
	{
		$query="SELECT ID from user WHERE Pesel=".$pesel;
		$z=mysqli_query($conn,$query);
		if (mysqli_num_rows($z) > 0)
		{
			$bufor=mysqli_fetch_assoc($z);
			$id=$bufor["ID"];
				
		}
		else {
			$query="INSERT INTO `user`(`Name`, `Surname`, `Telephone`, `Telephone2`, `Pesel`, `Email`) VALUES (\"".$name."\",\"".$surname."\",\"".$tel1."\",\"".$tel2."\",\"".$pesel."\",\"".$email."\")";
			if(mysqli_query($conn,$query))
			
			{
					$query="SELECT ID from user WHERE Pesel=".$pesel;
		$z=mysqli_query($conn,$query);
		if (mysqli_num_rows($z) > 0)
		{
			$bufor=mysqli_fetch_assoc($z);
			$id=$bufor["ID"];
			
		}
				
				
			}
		} 
		
		
		
		
		return $id;
		
		
	}
	
	function addbook($id,$od, $do, $house,$conn,$status,$user)
	{
		
		
		if(czywolne($od, $do, $house)==true){
			$query="INSERT INTO `reservations`(`User_ID`, `House`, `Bookfrom`, `Bookto`, `price`,`User`) VALUES (\"".$id."\",\"".$house."\",\"".$od."\",\"".$do."\",\"".$status."\",\"".$user."\")";
			if (mysqli_query($conn, $query))
			{
				echo 	 "Poprawnie zarejstrowano rezerwacje!."; 
				
				return true;

				
				
			}
			else{
				
							echo 	"Błąd bazy danych. Spróbuj ponownie później";
							
							return false;

			}
	
	
			}
			else 			echo $od."   ".$do."   ".$house;
{					echo		 "Termin rezerwacji jest już zajęty!";
	
			return false;

		}
	
	
		
		
	}
	function addbook2($id,$od, $do, $house,$conn,$status,$user,$payment)
	{
		
		
		if(czywolne($od, $do, $house)==true){
			$query="INSERT INTO `reservations`(`User_ID`, `House`, `Bookfrom`, `Bookto`, `price`,`User`,`payment`) VALUES (\"".$id."\",\"".$house."\",\"".$od."\",\"".$do."\",\"".$status."\",\"".$user."\",\"".$payment."\")";
			if (mysqli_query($conn, $query))
			{
				
				return true;

				
				
			}
			else{
				
									echo $query;
		
							
			return false;

			}
	
	
			}
			else 			{ return false;				}
			
			 

		
	
	
		
		
	}
	function getstawka($conn)
	{
		$query="SELECT stawka FROM stawka where id=1";
		$x=mysqli_query($conn,$query);
		$stawka=mysqli_fetch_assoc($x);
		
		return $stawka["stawka"];
	}
	
function iledni ($od, $do)
{
	 $od=strtotime($od)/3600/24;  //czas w dobach
		 $do=strtotime($do)/3600/24;
	
	$ile=$do-$od;
	return $ile;
	
}

function iledomow($conn)
{
	$query= "SELECT MAX(Number) FROM house";
$x= mysqli_query($conn, $query);
$bufor= mysqli_fetch_row($x);
return $bufor[0];

	
	
}



	function czywolnesin($from, $house)
	{global $conn;
		$ok=true;
		$query='SELECT * from reservations WHERE House='.$house;
		$currentdate = strtotime (date('y-md-d'))/3600/24;
		$fun=mysqli_query($conn,$query);
		 $odAsDate=strtotime($from)/3600/24;  //czas w dobach
		


		
			while($bufor=mysqli_fetch_assoc($fun))//dopóki są jakieś rezerwacje wykonuj pętle 
			{
				
				$bookfrom=strtotime($bufor["Bookfrom"])/3600/24;
				$bookto=strtotime($bufor["Bookto"])/3600/24;
				
				
					for ($z=$bookfrom;$z<=$bookto;$z++)
					{
						if ($z==$odAsDate) {return false;}
						
					}
				
				
				
				
			}			
			
			return true;
		
		
		
		
	}

	?>