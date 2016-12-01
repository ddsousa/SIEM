$(document).ready(function() {
	var selector = '.active li';
	$(selector).on('click', function(){
	    $(selector).removeClass('active');
	    $(this).addClass('active');
	});
});