<?php
session_start();
ob_start();

require("../master/connect.php");
$_SESSION['logged']=$_SESSION['logged'];
$query=mysqli_query($conn,'SELECT user FROM admin');
$results=mysqli_fetch_assoc($query);
$masteruser=$results["user"];

 if($_SESSION['logged']==$masteruser)
 {
	 
$od=$_GET["od"];
$do=$_GET["do"];
$name=$_GET["name"];
$surname=$_GET["surname"];
$tel1=$_GET["tel"];
$tel2=$_GET["tel2"];
$email=$_GET["email"];
$pesel=$_GET["pesel"];

$valnam = '/^[A-ZŁŚ]{1}+[a-ząęółśżźćń]+$/';
$valmail = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/';

if(preg_match($valnam, $name)) 
{
   if(preg_match($valnam, $surname))
      if(preg_match($valmail, $email))
  if ( strlen($tel1) == 9 && is_numeric($tel1) ) {
	  
	   if (preg_match('/^[0-9]{11}$/',$pesel)) {
		   
		   if (($od[4]=="/")&&($od[7]=="/")&&($do[4]=="/")&&($do[7]=="/"))
		   {
		   
		   $dozaplaty=getstawka($conn)*iledni($od,$do)*-1;
		   $iledomow=iledomow($conn);
		   for ($i=1; $i<=$iledomow;$i++)
		   {
			   if(czywolne($od,$do,$i)==true)
			   {
				   $idosoby=getoradd($conn, $pesel,$name,$surname,$tel1,$tel2,$email);
				   if ($idosoby>0)
				   {
					   	 if (addbook($idosoby,$od, $do, $i,$conn,$dozaplaty,"admin")==true)
						 {
							 echo " Do zapłaty:".$dozaplaty;
							 
							 
							  
						 }
						 

					   
				   }
			   else echo "Błąd: osobowy"; 
				   
				   
				break;   
			   } 
			   if (($i==$iledomow)&&(czywolne($od,$do,$i))) echo "Brak wolnych miejsc";
			   
			   
			   
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

/*1: Pobranie danych
2: walidacja danych pod wzgledem poprawności
	Pobieramy stawke i ilość dni mnożac 
3: pobranie ilości domków
4: petla tyle ile domkow: jeśli któryś wolny to konczymy petle i bierzemy ten domek i wpisujemy do rezerwacji 
5. Generujemy email: Imie, Nazwisko, Pesel, Numer rezerwacji, telefony, email, od, do, domek, Cena
*/
 }
 else echo "BŁĄD LOGOWANIA";
 ob_end_flush();
?>
