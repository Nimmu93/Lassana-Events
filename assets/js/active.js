jquery(document).ready(function($){
	//get current path and find target link
	var path = window.location.pathname.split("/").pop();

	//account for home or the orders page with empty path
	if ( path == '') {
		path = '../../clerk/orders.php';
	}

	var target = $('nav a[href="'+path+'"]');
	// add active class to target link
	target.addClass('active');
})