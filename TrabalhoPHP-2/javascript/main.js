$(document).ready(function() {
	// add navbar active class
	var current = window.location.href.substring(window.location.href.lastIndexOf('/')+1, window.location.href.lastIndexOf('.'));
	$('#nav_' + current).addClass('active');

	//add subnavbar active class (only on products page)
	if(current == 'list_all') {
		var type = window.location.href.substring(window.location.href.lastIndexOf('type=')+5);
		$('#subnav_' + type).addClass('active');
	}
});