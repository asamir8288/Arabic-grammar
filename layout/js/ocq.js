	$(document).ready( function(){
	
	$(".ocq-radio-btn").change(function(){
	$(this).parent().parent().find(".ocq-question-answer").hide();
	$(this).parent().find(".ocq-question-answer").eq(0).show();
	})
	
	
	
	$(".ocq-inner-list label").click(function(){
	
	$(this).parent().find(".ocq-radio-btn")[0].checked = true;	
	
	$(this).parent().parent().find(".ocq-question-answer").hide();
	$(this).parent().find(".ocq-question-answer").eq(0).show();
	})
	
	});