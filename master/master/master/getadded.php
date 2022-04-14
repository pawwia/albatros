<?php require("connect.php");
session_start();
$house=$_GET["house"];

 


?>
<html>
<head>
<link rel="stylesheet" media="screen" type="text/css" href="../pmu/datepicker.css" />
<script type="text/javascript" src="../pmu/datepicker.js"></script>
</head>
<body>
<div class="left">
<form method="POST" action="addadd.php" id="personal">
Imię:<br><input type="text" name="name"  required><br>
Nazwisko:<br><input type="text" name="surname" required><br>
Mężczyzna<input type="radio" name="sex" value="m">	Kobieta<input type="radio" name="sex" value="k"><br>
Telefon:<br><input type="text" name="tel"  required><br>
Telefon 2 :<br><input type="text" name="tel2"><br>
Urodziny:<br><input type="text" name="bday"><br>
Pesel:<br><input type="text" name="pesel"  required><br>
Email:<br><input type="text" name="email" required><br>
Pobyt od <br> <input type="text" name="od" id="od" class="single"><br>
Pobyt do <br> <input type="text" name="do" id="do"><br> 
</form>
</div>
<div class="right" ></div>
<script>

</script>
</body>
</html>