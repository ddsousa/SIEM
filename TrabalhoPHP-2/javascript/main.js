$(document).ready(function() {
	// add navbar active class
	var current = window.location.href.substring(window.location.href.lastIndexOf('/')+1, window.location.href.lastIndexOf('.'));
	$('#nav_' + current).addClass('active');

	if(current == 'list_all') {
		// add subnavbar active class (only on products page)
		if(window.location.href.indexOf('type=')>0) {
			var type = window.location.href.substring(window.location.href.lastIndexOf('type=')+5);
			$('#subnav_' + type).addClass('active');
		}

		// add page numbers active style (only on products page)
		if(window.location.href.indexOf('pg=') > 0) {
			if(window.location.href.indexOf('&') > 0)
				var page_num = window.location.href.substring(window.location.href.lastIndexOf('pg=')+3, window.location.href.indexOf('&'));
			else 
				var page_num = window.location.href.substring(window.location.href.lastIndexOf('pg=')+3);
		} else {
			page_num = 1;
		}

		$('#pg_' + page_num).addClass('active');
	}
});