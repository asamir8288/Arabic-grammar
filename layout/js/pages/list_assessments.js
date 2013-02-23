$(document).ready(function(){
    $('.visibility').click(function(e){
        e.preventDefault();
        var item = $(this);
        var assessment_id = $(this).attr('href');
        $.get(site_url() + 'admin/assessment/visibility/' + assessment_id, function(data){               
            if(data == 'false'){                    
                item.removeClass("active-img");
                item.addClass("inactive-img");                                
            } else{
                item.removeClass("inactive-img");
                item.addClass("active-img");
            }	  	
        });
    });
});