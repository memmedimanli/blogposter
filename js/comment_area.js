$(document).ready(function(){
	$("textarea.textarea2").hide(); // or you can have hidden w/ CSS
	$(".showarea").click(function(){
		post_id = $(this).attr("post");
		$("#" + post_id).fadeIn(100);
	});
});