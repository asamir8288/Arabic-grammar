	$(document).ready( function(){
	

		$(".b-list").dragsort({ 
		dragSelector: ".b-list-item",
		dragBetween: true,

		dragEnd: function()
		{
		
		var answerNum = $(this).index();
		$(this).removeClass("connected-active-item");
		
		var questionIndex = $(this).attr("question-index" );		
		var questionText = $(this).text();
		
		//If Correct Answer
		if($(".a-list-item").eq(answerNum).attr("correct-answer") == questionIndex )		
			{
			$(this).addClass("connected-active-item");
			}
			
			$( ".b-list-item" ).each(function(i) {
			 
			 if(($(this).attr("question-index" ) != $(".a-list-item").eq($(this).index()).attr("correct-answer")) && $(this).hasClass("connected-active-item") == true)
				{$(this).removeClass("connected-active-item"); }
			
			});

		},		
		placeHolderTemplate: "<li class='placeHolder connected-active-item'><span></span></li>" });


				
		$(".b-list-item").live("click", function(){
		var questionIndex = $(this).attr("question-index" );		
		var questionText = $(this).text();
		
		
		$(this).removeClass("connected-active-item");
		if($(".a-list-item").eq($(this).index()).attr("correct-answer") == questionIndex )		
			{
				$(this).addClass("connected-active-item");
			}
	
	
		});
	

	
	
	});