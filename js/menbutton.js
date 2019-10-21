$(document).ready(main);
 
var contador2 = 1;
 
function main(){
	$('.menu_bar2').click(function(){
		// $('nav').toggle(); 
 
		if(contador2 == 1){
			$('#nav').animate({
				left: '0'
			});
			contador2 = 0;
		} else {
			contador2 = 1;
			$('#nav').animate({
				left: '-100%'
			});
		}
 
	});
 
};