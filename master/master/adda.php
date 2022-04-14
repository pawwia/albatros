<!DOCTYPE html>

<html lang="pl">
<head>






<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">



<link rel="stylesheet" type="text/css" href="master.css">
<meta charset="UTF-8">
<meta name="author" content="Cheapest Websites">
<title>ADMIN WEBSITE </title>
</head>
<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#" id="closemenu">
                      Admin Panel
                    </a>
                </li>
                <li>
                    <a href="#">Dodaj/Sprawdź</a>
                </li>
                <li>
                    <a href="#">Szukaj</a>
                </li>
                <li>
                    <a href="unlog.php">Wyloguj</a>
                </li>
                <li>
                    <a href="../index.html">Strona główna</a>
                </li>
               
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
		                 <a href="#menu-toggle" class="menu" id="menu-toggle">MENU</a>

            <div class="container-fluid">
				 <div class="getdate">
				 <select id="monate">
				 <option value="01" >Styczeń</option>
				 
				<option value="02" >Luty</option>
				 <option value="03" >Marzec</option>
				 <option value="04" >Kwiecień</option>
				 <option value="05" >Maj</option>
				 <option value="06" >Czerwiec</option>
				 <option value="07" >Lipiec</option>
				 <option value="08" >Sierpień</option>
				 <option value="09" >Wrzesień</option>
				 <option value="10" >Październik</option>
				 <option value="11" >Listopad</option>
				 <option value="12" >Grudzień</option>

				 </select>
				 
				 <select id="jaren">
				 	<option value="2018" >2018</option>
				 	<option value="2019" >2019</option>
				 	<option value="2020" >2020</option>
				 	<option value="2021" >2021</option>
				 	<option value="2022" >2022</option>
				 	<option value="2023" >2023</option>
				 	<option value="2024" >2024</option>
				 	<option value="2025" >2025</option>
				 	<option value="2026" >2026</option>
				 	<option value="2027" >2027</option>
				 	<option value="2028" >2028</option>

				 </select>
				 </div>				 
<div class="dostepnosc1"></div>
				<div class="row cont"> <div class=" dostepnosc" >
				 <form class="formaddmaster">
				Od <select id="odyear">
				 <option value="2018">2018</option>
				 <option value="2019">2019</option>
				 <option value="2020">2020</option>
				 <option value="2021">2021</option>
				 <option value="2022">2022</option>
				 <option value="2023">2023</option>
				 <option value="2024">2024</option>
				 <option value="2025">2025</option>
				 <option value="2026">2026</option>
				 <option value="2027">2027</option>
				 <option value="2028">2028</option>
				</select> 
				<select id="odmonth">
				 <option value="01">Styczeń</option>
				 <option value="02">Luty </option>
				 <option value="03">Marzec</option>
				 <option value="04">Kwiecień</option>
				 <option value="05">Maj</option>
				 <option value="06">Czerwiec</option>
				 <option value="07">Lipiec</option>
				 <option value="08">Sierpień</option>
				 <option value="09">Wrzesień</option>
				 <option value="10">Październik</option>
				 <option value="11">Listopad</option>
				 <option value="12">Grudzień</option>

				</select>
				<select id="odday" ></select>
				 </form></br>
				 	<form>do <select id="doyear">
				 <option value="2018">2018</option>
				 <option value="2019">2019</option>
				 <option value="2020">2020</option>
				 <option value="2021">2021</option>
				 <option value="2022">2022</option>
				 <option value="2023">2023</option>
				 <option value="2024">2024</option>
				 <option value="2025">2025</option>
				 <option value="2026">2026</option>
				 <option value="2027">2027</option>
				 <option value="2028">2028</option>
				</select> 
				<select id="domonth">
				 <option value="01">Styczeń</option>
				 <option value="02">Luty </option>
				 <option value="03">Marzec</option>
				 <option value="04">Kwiecień</option>
				 <option value="05">Maj</option>
				 <option value="06">Czerwiec</option>
				 <option value="07">Lipiec</option>
				 <option value="08">Sierpień</option>
				 <option value="09">Wrzesień</option>
				 <option value="10">Październik</option>
				 <option value="11">Listopad</option>
				 <option value="12">Grudzień</option>

				</select>
				<select id="doday"></select>
				 </form></br>
				 Imię:<br> <input type="text" id="name" ><br>
				 Nazwisko:<br> <input type="text" id="surname" ><br>
				 Telefon:<br> <input type="text" id="tel" ><br>
				 Telefon2:<br> <input type="text" id="tel2" ><br>
				 Pesel:<br> <input type="text" id="pesel" ><br>
				 Email:<br> <input type="text" id="email" ><br>
<button id="corb">Sprawdź/rezerwuj</button>
				 </div>
				<div class="action">
				</div></div>
				
               
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
     
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>

     
		
		 <script>
    $("#menu-toggle, #closemenu").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
	
	$("#monate, #jaren").change(function(){
		var year=$("#jaren").val();
		var month=$("#monate").val();
		$(".dostepnosc1").load("adda-avability.php?year="+year+"&month="+month);
		
		
		
	});
	$("#odmonth").change(function(){
		var ile=parseInt($("#odmonth").val());
	switch(ile){
		case 1:case 3:case 5:case 7: case 8: case 10: case 12: var iledni=31;break;
		case 4:case 6:case 9:case 11: var iledni=30;break;
		case 2: iledni=29;break;

	};
	var napis="";
	for (var i=1;i<=iledni;i++)
	{var z="";
if (i<10){z="0"+i;}
if (i>0){z=i;}
		napis=napis+"<option value=\""+z+"\">"+z+"</option>";
		
	}
		
		$("#odday").html(napis);
		
	});
	$("#domonth").change(function(){
		var ile=parseInt($("#domonth").val());
	switch(ile){
		case 1:case 3:case 5:case 7: case 8: case 10: case 12: var iledni=31;break;
		case 4:case 6:case 9:case 11: var iledni=30;break;
		case 2: iledni=29;break;

	};
	var napis="";
	for (var i=1;i<=iledni;i++)
	{var z="";
if (i<10){z="0"+i;}
if (i>0){z=i;}
		napis=napis+"<option value=\""+z+"\">"+z+"</option>";
		
	}
		$("#doday").html(napis);
		
		
		
	});
	$("#corb").click(function(){
		var name=$("#name").val();
		var surname=$("#surname").val();
		var email=$("#email").val();
		var tel=$("#tel").val();
		var tel2=$("#tel2").val();
		var pesel=$("#pesel").val();
		var odday=$("#odday").val()
		var doday=$("#doday").val()

		if(odday<10) odday="0"+odday;
		if(doday<10) doday="0"+doday;

		var od=$("#odyear").val()+"/"+$("#odmonth").val()+"/"+odday;
		var do1=$("#doyear").val()+"/"+$("#domonth").val()+"/"+doday;

		$(".action").load("addmaster.php?name="+name+"&surname="+surname+"&email="+email+"&tel="+tel+"&tel2="+tel2+"&pesel="+pesel+"&od="+od+"&do="+do1);
		
		
	});
	
    </script>
</body>




</html>