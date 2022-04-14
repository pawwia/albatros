var clicked=1;
function toggle_menu(){
	if (($(window).width())<736){
	if(clicked==1) clicked=0;
	else if (clicked==0) clicked=1;
	if (clicked==1){
		//$("nav").css("position","static")
		
	}
	if (clicked==0){
		$("nav").css("position","static")
		
	}
	else if (clicked==1){
		$("nav").css("position","fixed")
		
	}
	$(".buttons").slideToggle();

	}
}