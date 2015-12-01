(function($){
	$(document).ready(function(){
		$("#customize-controls").prepend('<div class="dragbar"></div>');
		$('#customize-controls .dragbar').mousedown(function(e) {
	        e.preventDefault();
	        $('.wp-full-overlay').prepend('<div id="draghelper"></div>');
	        $(document).mousemove(function(f){
	        	console.log(f.pageX)
	            if(f.pageX >= 300 && $(window).width() - f.pageX >= 200 ) {
	                $('.wp-full-overlay.expanded').css('margin-left', f.pageX);
	                $('.wp-full-overlay-sidebar').css('width', f.pageX);
	            }
			});
		});
		$(document).mouseup(function() {    
			$(document).unbind('mousemove');
        	$('#draghelper').remove();
		});

	});
}(jQuery));