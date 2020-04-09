$(document).ready(function(){
	
	//Short Text
	var max = 45;
	$(".nsr_small").each(function(){
		fulltext = $(this).text();
		if (fulltext.length > 45) {
		   $(this).text(fulltext.substr(0, max - 3));
		   $(this).append('...');
		}
	});
	
});