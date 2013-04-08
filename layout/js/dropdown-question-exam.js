$(document).ready( function(){
	
		
    $(".dropdown-item").live("change", function(){
        var dropDownText = $(this).find("option:selected").text();
        $(this).fadeOut(1);	
	
        $(this).parent().find(".empty-line-item").removeClass("dropdown-answer");
		
        $(this).parent().find(".empty-line-item").fadeIn(200);
        if($(this).find("option:selected").val() == "dropdown-answer")
        {
            $(this).parent().find(".empty-line-item").eq(0).text(dropDownText);
            $(this).parent().find("#user_answers").eq(0).val(dropDownText);
            $(this).parent().find(".empty-line-item").eq(0).addClass("dropdown-answer");		
        }        
        else{
            $(this).parent().find(".empty-line-item").eq(0).text("------");			
            $(this).parent().find("#user_answers").eq(0).val('');			
	
        }		
    });
	
	
	
    $(".empty-line-item").click(function(){
	
        $(this).fadeOut(1);
        $(this).parent().find(".dropdown-item").eq(0).fadeIn(1);
		
    });
	
});