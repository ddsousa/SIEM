$(document).ready(function() {

	var current = window.location.href.substring(window.location.href.lastIndexOf('/')+1, window.location.href.lastIndexOf('.'));
	$('#nav_' + current).addClass('active');
});