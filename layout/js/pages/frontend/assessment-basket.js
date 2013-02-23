$(document).ready(function(){
    if($('#assessment_count').val() > 0){
        $('.start-trainings').show();
        $('.no-assessment').hide();
    }else{
        $('.start-trainings').hide();
        $('.no-assessment').show();
    }
    
    $('.assessment-btn').live("click", function(){    
        $(this).parent().nextAll().remove();
        var menu_id = $(this).attr('menu_id');
        var current = $(this);
        $.get(site_url() + 'assessment/get_submenu_items/' + menu_id, function(data){
            if(data != 'done'){
                current.parent().find('.assessment-active').removeClass('assessment-active');
                current.addClass('assessment-active');                
                $('#menu_groups').append(data);
            }else{
                $.get(site_url() + 'assessment/add_to_user/' + menu_id, function(result){
                    if(result == true){
                        if($('#assessment-list').length > 0){
                            $('.start-trainings').show();
                        }
                        current.addClass('assessment-active');
                        $('.no-assessment').remove();
                        $('.start-trainings').before('<div class="assessment-name-box">'+ current.html() +'</div>');
                    }else{
                        if(result == 'still_running'){
                            // TODO
                        }else{
                            $('.no-assessment').html('<div>هذا الامتحان غير فعال الان</div>');
                            $('.no-assessment').show();
                        }
                        
                    }
                }, 'json');
            }            
        })
    }); 
});    