	$(document).ready( function(){
	
		
$(".dropdown-item").live("change", function(){
	var dropDownText = $(this).find("option:selected").text();
	$(this).fadeOut(1);
	$(".feedback-on-answer").fadeOut(1400);
	
	$(this).parent().find(".empty-line-item").removeClass("correct-item-selected");
	$(this).parent().find(".empty-line-item").removeClass("wrong-item-selected");
		
	$(this).parent().find(".empty-line-item").fadeIn(200);
	if($(this).find("option:selected").val() == "correct-dropdown-answer")
	{
		$(this).parent().find(".empty-line-item").eq(0).text(dropDownText);
		$(this).parent().find(".empty-line-item").eq(0).addClass("correct-item-selected");
		$(".dropdown-questions-wrapper").append('<p class=\"feedback-on-answer correct-answer-feedback\">'+dropDownText +' إجابة صحيحة</p>');
}
	else if($(this).find("option:selected").val() == "wrong-dropdown-answer")
	{
		$(this).parent().find(".empty-line-item").eq(0).text(dropDownText);
		$(this).parent().find(".empty-line-item").eq(0).addClass("wrong-item-selected");
		
		$(".dropdown-questions-wrapper").append('<p class=\"feedback-on-answer wrong-answer-feedback\">'+dropDownText +' إجابة خاطئة</p>');

		
	}
	else{
		$(this).parent().find(".empty-line-item").eq(0).text("------");	
		$(".dropdown-questions-wrapper").append('<p class=\"feedback-on-answer wrong-answer-feedback\">من فضلك إختر إجابة</p>');
	
	}
	

/*				setTimeout(function(){
		$(".feedback-on-answer").fadeOut(800);
		},3000);
	*/

		
	});
	
	
	
	$(".empty-line-item").click(function(){
	
	$(this).fadeOut(1);
	$(this).parent().find(".dropdown-item").eq(0).fadeIn(1);
		
	});
	
	});