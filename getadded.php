<?php require("connect.php");
session_start();
$house=$_GET["house"];

 


?>
<html>
<head>
<link rel="stylesheet" media="screen" type="text/css" href="pmu/datepicker.css" />
<script type="text/javascript" src="pmu/datepicker.js"></script>
<script>

</script>
</head>
<body>
<div class="left">
<form method="POST"  id="personal">
Imię:<br><input type="text" name="name" value="Adam" required><br>
Nazwisko:<br><input type="text" name="surname" value="Asnyk" required><br>
Mężczyzna<input type="radio" name="sex" value="m">	Kobieta<input type="radio" name="sex" value="k"><br>
Telefon:<br><input type="text" name="tel" value="663222222"  required><br>
Telefon 2 :<br><input type="text" name="tel2"><br>
Urodziny:<br><input type="text" name="bday"><br>
Pesel:<br><input type="text" name="pesel" value="12312312311" required><br>
Email:<br><input type="text" name="email" value="Adam@gmail.com" required><br>
Pobyt od <br> <input type="text" name="od" id="od" value="2018/04/01" class="single"><br>
Pobyt do <br> <input type="text" name="do" id="do" value="2018/04/20"><br> 
<input type="button" onclick="getit()" value="Prześlij">
</form>
</div>
<div class="right" ></div>


</body>
</html>