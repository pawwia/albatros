<?php

$email='wiatrakpawel@gmail.com';
$title='DOMKI-- WIADOMOŚĆ';
$tekst=$_GET["from"]." ".$_GET["mess"];

$x=mail($email,$title,$tekst);
if ($x)
{
	echo "<div class='alert alert-success fade in'>Wiadomość została wysłana</div>";
	
}

else{ echo "<div class='alert alert-danger fade in'>Wiadomość nie została wysłana </div>";

}


?>