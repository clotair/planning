 jQuery(document).ready(function($){
 	$('#text-parox, #text-saga, #text-ttssl').css('display', 'none');
 	$('#parox').click(function(){
 		$('#text-saga').fadeOut('fast');
 		$('#text-ttssl').fadeOut('fast');
 		$('#contact-index').fadeOut('fast');
 		$('#text-parox').slideDown(500).fadeIn();
 });
 	$('#saga').click(function(){
 		$('#text-parox').fadeOut('fast'); 		
		$('#text-ttssl').fadeOut('fast');
 		$('#contact-index').fadeOut('fast');
 		$('#text-saga').slideDown(500).fadeIn();
 });
 	$('#ttssl').click(function(){
 		$('#text-saga').fadeOut('fast');
 		$('#text-parox').fadeOut('fast');
 		$('#contact-index').fadeOut('fast');
 		$('#text-ttssl').slideDown(500).fadeIn();
 	});
 	$('#text-parox, #text-saga, #text-ttssl').click(function(){
 		$('#text-parox, #text-saga, #text-ttssl').slideUp(400);
		$('#contact-index').fadeIn(500);
 	});
 });

