

function anuluj() {
	
	window.location.href="anuluj.php";
	
}

function edytuj() {
	
	window.location.href="booking.php";
	
	$(".block-reservation").css("display", "block");
	$(".block-reservation").slideDown();
}

function ok() {
	$(".pay").css("display", "block");
	$(".pay").slideDown();
}