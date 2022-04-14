setInterval (function(){
	
	if (($(window).width())>736){
var scrolly2=window.pageYOffset;	
	
	
	
	if((scrolly2)>70) {
	$("nav").addClass("sticky-menu");
	var typ=$("nav").css("display");
	if(typ=="none") 
		$("nav").stop().slideDown("slow");
	}
	
	 if((scrolly2)<70)
	{				
		$("nav").removeClass("sticky-menu");

		
	}
}},300);

function indoor(){
	$("#indoor").slideToggle();
	$(".galery_choose").slideToggle();
$('html, body').animate({
    scrollTop: $("#indoor").offset().top-300
}, 1000);
}
function outdoor(){
	$("#outdoor").slideToggle();
	$(".galery_choose").slideToggle();
$('html, body').animate({
    scrollTop: $("#outdoor").offset().top-300
}, 1000);
}

function goupin(){
	
	$("#indoor").slideUp();
	$(".galery_choose").slideToggle();
	$('html, body').animate({
    scrollTop: $(".galery_choose").offset().top-400
}, 1000);

}
function goupout(){
	
	$("#outdoor").slideUp();
	$(".galery_choose").slideToggle();
$('html, body').animate({
    scrollTop: $(".galery_choose").offset().top-400
}, 1000);
}







function sm() {
	var check=false;
	
	var from1=document.getElementById("kontakt").email.value;
	var main=document.getElementById("kontakt").main.value;
	if(from1.length>7&&main.length>30){
		$(".failedmail").slideUp();
		check=true;
	}
	else {$(".failedmail").slideDown();}
if(check==true){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("kontakt").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "send_message.php?from="+from1+"&mess="+main, true);
xhttp.send();}}



$(document).ready(function() { 
 
	$('a[href^="#"]').on('click', function(event) {
	
		var target = $( $(this).attr('href') );
	
		if( target.length ) {
			event.preventDefault();
			$('html, body').animate({
				scrollTop: target.offset().top
			}, 1000);
		}
	});
 
});
$( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
