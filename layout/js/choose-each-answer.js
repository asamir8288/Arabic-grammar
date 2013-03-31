$(document).ready( function(){	
    $(".normal-span-answer").live("click", function(){

        $(".feedback-on-answer").fadeOut(1200);

        if($(this).attr("value") !="correct answer")
        {
            $(this).removeClass("normal-span-answer");
            $(this).addClass("wrong-span-answer");
		
            $(".choose-each-question-main-paragraph").after('<p class=\"feedback-on-answer wrong-answer-feedback\">'+$(this).text() +': إجابة خاطئة</p>');
        }
        else{
            $(this).removeClass("normal-span-answer");
            $(this).addClass("correct-span-answer");				
		
            $(".choose-each-question-main-paragraph").after('<p class=\"feedback-on-answer correct-answer-feedback\">'+$(this).attr("answer") +'</p>');
        }		
    });
	
	
	
	
});