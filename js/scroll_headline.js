// JavaScript Document
$(function() {
	function headline() {
		setTimeout(function() {
			headline();
			$("#latest_news li").not(':first').css('display', 'none');
			$("#latest_news li:first").fadeOut('normal', function() {
				$(this).next().fadeIn('normal');
				$(this).clone().appendTo("#latest_news ul");
				$(this).remove();
			});
		}, 3000);
	}
	var n_size = $("#latest_news li").size();
	if(n_size > 1) {
		headline();
	}
});