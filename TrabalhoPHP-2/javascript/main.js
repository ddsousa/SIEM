$(document).ready(function() {
	$('.menu li').on('click', function(){
	  //alert($(this).text());
	  $('#'+$(this).text()).addClass('active');
	    /*$(selector).removeClass('active');
	    $(this).addClass('active');*/
	});
});