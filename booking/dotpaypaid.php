<?php 
require("../master/connect.php");
$op_type=$_POST["operation_type"];
$description=$_POST["description"];
$opnum=$_POST['operation_number'];
$status=$_POST["operation_status"];
$complited=$_POST["is_completed "];
$opamount=$_POST["operation_amount"];
$desc=explode("//",$description);
$pesel=$desc[0]; 
$od=$desc[1]; 
$do=$desc[2]; 
$name=$desc[3]; 
$surname=$desc[4]; 
$tel=$desc[5]; 
$tel2=$desc[6]; 
$dkwota=$desc[7]; 
$email=$desc[8];

$iledomow=iledomow($conn);
if($status=="completed")
{
	$id=getoradd($conn, $pesel,$name,$surname,$tel,$tel2,$email);
	if ($id>0)
	{$in=1;
		while($in<=$iledomow)
		{ 	

			if (addbook2($id,$od, $do, $in,$conn,"0","SYSTEM",$opnum))
			{
				$query= "SELECT * FROM reservations WHERE `User_ID`=\"".$id."\" and `Bookfrom`=\"".$od."\"and `Bookto`=\"".$do."\"and `House`=\"".$in."\"";
				$d= mysqli_query($conn, $query);
				if (mysqli_num_rows($d))
				{
					$bufor= mysqli_fetch_assoc($d);
					$wiadomosc= "Witaj. \n  Została utworzona oraz opłacona rezerwacja na stronie ....... \n Dane rezerwacji: \n ID:".$bufor["ID"]."\n Domek: ".$in."\n Czas pobytu od: ".$od."\n Czas pobytu do: ".$do;
					$title= "Potwierdzenie rezerwacji w serwisie XDD.pl ";
					if (mail($email,$title,$wiadomosc)){
					echo "OK";}
				}

				
				break;
			}
							

			$in++;
		}
	}
	
}

else if ($status=="rejected") echo "OK" ;?>