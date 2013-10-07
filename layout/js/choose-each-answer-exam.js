$(document).ready( function(){
    
    $(".normal-span-answer").live("click", function(){
        var highlighted = $(".selected-span-answer");
//        highlighted.removeClass("selected-span-answer");
        highlighted.addClass("normal-span-answer");

        $(this).removeClass("normal-span-answer");
        $(this).addClass("selected-span-answer");
        
        var user_answer = $('#user_answer').val();
        if(user_answer == ''){
            user_answer += $(this).html();
        }else{
            user_answer += ',' + $(this).html();
        }
        
        $('#user_answer').val(user_answer);
    });
    
});