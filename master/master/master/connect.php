<?php $serwer="localhost";
$user="root";
$pass="";
$error="BŁĄD ŁĄCZENIA Z BAZĄ DANYCH. Skontaktuj sie z Administratorem";
$baza="rezerwacje";

 $conn= mysqli_connect($serwer,$user,$pass,$baza) or die ("BŁĄD! Skontaktuj się z administratorem");
	global $conn;
	function czywolne($from, $to, $house)
	{global $conn;
		$ok=true;
		$query='SELECT * from reservations WHERE House='.$house;
		$currentdate = strtotime (date('y-md-d'))/3600;
		$fun=mysqli_query($conn,$query);
		 $odAsDate=strtotime($from)/3600;  //czas w dobach
		 $toAsDate=strtotime($to)/3600;
		if($odAsDate<$currentdate) return false; // jeśli początkowa jest mniejsza od dziś
		if($toAsDate<$currentdate) return false; // jeśli końcowa jest mniejsza od dziś
		if($toAsDate<=$odAsDate) return false; // jeśli końcowa jest mniejsza od dziś


		
			while($bufor=mysqli_fetch_assoc($fun))//dopóki są jakieś rezerwacje wykonuj pętle 
			{
				
				$bookfrom=strtotime($bufor["Bookfrom"])/3600;
				$bookto=strtotime($bufor["Bookto"])/3600;
				for ($i=$odAsDate; $i<$toAsDate;$i++)
				{
				
					for ($z=$bookfrom;$z<=$bookto;$z++)
					{
						if ($z==$i) {echo "XDDD2";return false;}
						
					}
				
				}
				
				
			}			
			echo "TAAAAAAAAAAK XDDD222";
			return true;
		
		
		
		
	}
	
	?>