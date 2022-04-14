<?php
$data=$_GET['dstart'];
echo $data;
$miesiac = (explode("/",$data));
require("master/connect.php");
session_start();
$houses=iledomow($conn);
$month=$miesiac[1];
$year=$miesiac[0];
switch ($month)
{
	case 1:$ile=31;  break;

	case 2:$ile=29;  break;
	case 3:$ile=31;  break;
	case 4:$ile=30;  break;
	case 5:$ile=31;  break;
	case 6:$ile=30;  break;
	case 7:$ile=31;  break;
	case 8:$ile=31;  break;
	case 9:$ile=30;  break;
	case 10:$ile=31;  break;
	case 11:$ile=30;  break;
    case 12:$ile=31;  break;

};
$odst=$ile*40;
echo "<div class=\"avabil\" style=\"width:100%; height:350px;margin-bottom: 30px;border-right:2px solid black; background-color:grey;    scroll-direction: horizontal;   overflow: auto;  ;white-space: nowrap; \">";

	echo "<div class=\"itemcontainer\" style=\"background-color:yellow;;float:left; display:block;height:50px; width:".$odst."px;              \"> 
	
	
	";

for ($i=1;$i<=$ile;$i++)
{
echo "<span class=\"itemsm\" style=\"height:50px; width:40px;float:left;border-right:black 2px solid; border-top:black 2px solid;\" >".$i."</span>";	
}
echo "</div>";

for ($i=1;$i<=$houses;$i++)
{echo "<div class=\"itemcontainer\" style=\"background-color:yellow;;float:left; display:block;height:50px; width:".$odst."px;              \">" ;
	
	for ($z=1;$z<=$ile;$z++)
	{
	$data=$year."/".$month."/".$z;
	if (czywolnesin($data,$i)==true)
	{
		echo "<span class=\"itemsm\" style=\"height:50px; width:40px;float:left;border-right:black 2px solid;background-color:green; border-top:black 2px solid;\" >".$z."</span>";
		
	}
	else {
		
		
		echo "<span class=\"itemsm\" style=\"height:50px; width:40px;float:left;border-right:black 2px solid;background-color:red; border-top:black 2px solid;\" >".$z."</span>";
	}
	
	
	}
	echo "</div>";

}
echo "</div>";
?>