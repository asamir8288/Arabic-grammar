$(document).ready( function(){
	
    $(".b-list").dragsort({ 
        dragSelector: ".b-list-item",
        dragBetween: true,

        dragEnd: function()
        {
            $(this).addClass("connected-active-item");
        },		
        placeHolderTemplate: "<li class='placeHolder connected-active-item'><span></span></li>"
    });


				
    $(".b-list-item").live("click", function(){

        $(this).addClass("connected-active-item");
    });
	

    $('#drag_drop_form').submit(function(){
        var answerString = "";
        $( ".b-list-item" ).each(function( index ) {
            if ($(this).index() == 0)
                answerString += $.trim($(this).text());
            else
                answerString += "," + $.trim($(this).text());
        });

        $('#user_answer').val(answerString);
//        return false;
    });
	
});