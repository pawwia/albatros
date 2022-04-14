var wh;
 


function checkdate()
{
var dateboth= document.getElementById("input-id").value;
if (dateboth.length<=0){
	
	document.getElementById("alert1").innerHTML="Wprowadź datę!"; 
	$("#alert1").slideDown();
	return false;
	
}	
if ((dateboth[4]!="-")||(dateboth[7]!="-")||(dateboth[11]!="-")||(dateboth[17]!="-")||(dateboth[20]!="-")||(dateboth[10]!=" ")||(dateboth[12]!=" ")		)
{
	
	document.getElementById("alert1").innerHTML="Wprowadzono błędną datę."; 
	$("#alert1").slideDown();
	return false;
	
}
var datebufor=dateboth.split(" - ");
var datebuf=datebufor[0].split("-");
var datefrom=datebuf[0]+"/"+datebuf[1]+"/"+datebuf[2];
var datebuf=datebufor[1].split("-");
var dateto=datebuf[0]+"/"+datebuf[1]+"/"+datebuf[2];

 //----------------------------------pobieranie ilości domów (początek) XD
var stan;


   $("#whichhouse").load("booking/gethouse.php",  function (responseTxt, statusTxt, xhr)
	  {
            if(statusTxt == "success")
			{
				 wh=$("#whichhouse").text();
				wh=parseInt(wh);
				for (var i=1;i<=wh;i++)
				{
					
					$("#d"+i).load("master/checkdate.php?dstart="+datefrom+"&dstop="+dateto+"&house="+i);
				}			
				
			}
            if(statusTxt == "error")
                alert("rezerwacja.js if statustxt ==error");
        });
	 
	 var freeacc1;	 var freeacc2;
	 var freeacc3;
	 var freeacc4;
	 var freeacc5;
	 var freeacc6;

$('#allhidden').bind("DOMSubtreeModified",function(){

 freeacc1=parseInt($("#d1").text());
 freeacc2=parseInt($("#d2").text());
 freeacc3=parseInt($("#d3").text());
freeacc4=parseInt($("#d4").text());
 freeacc5=parseInt($("#d5").text());
freeacc6=parseInt($("#d6").text());

if ((freeacc1==0)||(freeacc2==0)||(freeacc3==0)||(freeacc4==0)||(freeacc5==0)||(freeacc6==0))
{
	
		$("#suma").load("booking/whatprice.php?od="+datefrom+"&do="+dateto);

	$(".block-reservation").slideDown();
	
	$(".failed-reservation").slideUp();
	$(".failed-reservation2").slideUp();
	
	
}

if ((freeacc1==1)&&(freeacc2==1)&&(freeacc3==1)&&(freeacc4==1)&&(freeacc5==1)&&(freeacc6==1))

 {
	
		
		$(".failed-reservation2").load("adda-avability-user.php?dstart="+datefrom);
		
		$(".failed-reservation").slideDown();
		$(".failed-reservation2").slideDown();
		
		$(".block-reservation").slideUp();

	
	
}


});






}

	function trytobook()
	{
		
				

		var dateboth= document.getElementById("input-id").value;

		var datebufor=dateboth.split(" - ");
var datebuf=datebufor[0].split("-");
var datefrom=datebuf[0]+"/"+datebuf[1]+"/"+datebuf[2];
var datebuf=datebufor[1].split("-");
var dateto=datebuf[0]+"/"+datebuf[1]+"/"+datebuf[2];

var name=document.getElementById("name").value;

var surname=document.getElementById("surname").value;
var tel=document.getElementById("tel").value;
var tel2=document.getElementById("tel2").value;
var email=document.getElementById("email").value;
var pesel=document.getElementById("pesel").value;


		//------------sprawdzanie poprawności danych
		var allcorrect=0
		
var letters = /^[A-Za-ząćęłńóśźżĄĆĘŁŃÓŚŹŻ\- ]+$/  // zrób coś żeby to wyr regularne uwzglądniało polskie znaki, i zeby w nazwisku pasowały nazwiska dwuczłonowe xD i pozniej jak to wszystko bd dzialac 
if(name.match(letters))//    to trzeba zrobic if allcorrect==5 i robimy linka w nowej karcie ktory tam go przekieruje na jakąś stronę rezerwacji i płatności
//                            aaa no i jeszcze trzeba zrobic gdzies przy tym przycisku rezerwuj (tym 2) zeby wyswietlala sie kwota cala-- to by trzeba bylo zrobic plik w php 
//                             i ajaxem go pierdolnąć tam zeby sie wyświetlał  a ajaxa mozna uzyc latwo:$("#gdzie").load("co pobrac.php") ;} życzę miej pracy ;) 

{

allcorrect=allcorrect+1
}
else
{
alert('Proszę poprawić imię.');
return false;
}
if(surname.match(letters))
{
allcorrect=allcorrect+1
}
else
{
alert('Proszę poprawić Nazwisko.');
return false;
}
var mailformat = /^([A-Za-z0-9ąćęłńóśźżĄĆĘŁŃÓŚŹŻ_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,8})$/;
if(email.match(mailformat))
{
allcorrect=allcorrect+1
}
else
{
alert("Wprowadzono niepoprawny adres E-mail");

return false;}
		var numbers = /^[0-9]+$/;
if(tel.match(numbers))
{
allcorrect=allcorrect+1
}
else
{
alert('Wprowadzono zły numer kontaktowy');

return false;
}
	 var reg = /^[0-9]{11}$/;
  //  if(reg.test(pesel) == false) 
	  if(!pesel.match(reg)) {
		alert('Wprowadzono zły numer pesel');
        return false;
	} else
    {
        var digits = (""+pesel).split("");
        if ((parseInt(pesel.substring( 4, 6)) > 31)||(parseInt(pesel.substring( 2, 4)) > 12))
            return false;
         
        var checksum = (1*parseInt(digits[0]) + 3*parseInt(digits[1]) + 7*parseInt(digits[2]) + 9*parseInt(digits[3]) + 1*parseInt(digits[4]) + 3*parseInt(digits[5]) + 7*parseInt(digits[6]) + 9*parseInt(digits[7]) + 1*parseInt(digits[8]) + 3*parseInt(digits[9]))%10;
        if(checksum==0) checksum = 10;
            checksum = 10 - checksum;
 
        allcorrect=allcorrect+((parseInt(digits[10])==checksum));
    }
	
	
	if(allcorrect==5)  {
		$("#book").css("display", "none");
		
		
		window.location.href = "booking/bookme.php?od="+datefrom+"&do="+dateto+"&name="+name+"&surname="+surname+"&pesel="+pesel+"&tel1="+tel+"&tel2="+tel2+"&email="+email;
	}
	
	
	
	}

	
	
	
	
	
	$('.block-reservation').bind('input', function() { 
				$("#book").css("display", "block");

    $(".block-pay").slideUp();
});
	
	$('.termin').bind('input', function() { 
			$("#book").css("display", "block");

    $(".block-reservation").slideUp();    $(".block-pay").slideUp();
});
	