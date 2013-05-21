$(document).ready(function(){
    $(".custom-checkbox").click(function(){	  
        if($(this).hasClass("custom-checkbox-checked")){
            $('.hidden-availability').val('no');
            $(this).removeClass("custom-checkbox-checked");            
        } else{
            $('.hidden-availability').val('yes');
            $(this).addClass("custom-checkbox-checked");            
        }	  	
    });
    
    $('#menu_id').live("change", function(){   
        $(this).parent().parent().nextAll().remove();
        if($('#menu_id option:selected').val() != ''){            
            $.get(site_url() + 'admin/assessment/get_submenu_items/' + $(this).val(), function(data){
                if(data != 'done'){
                    $('#menu_groups').append(data);
                }else{
                    var assessment_name = $(this + ':selected').last().text();
                    $('#name').val(assessment_name);
                    $('#assessment_fields').slideDown();
                }            
            })
        }else{
            $('#assessment_fields').slideUp();
        }
        
    });
    
    // validation section
    $('#create_assessment').submit(function(){
        var error_flag = true;
        $('select#menu_id').each(function(){    
            if($(this).find('option:selected').val() == ''){
                $(this).after('<span generated="true" class="error" style="">من فضلك ادخل هذا الحقل</span>');
                error_flag = false;
            }else{
                $('.error').remove();
            }              
        });
            
        if($('#description').val() == ''){
            $('#description').after('<span generated="true" class="error" style="">من فضلك ادخل هذا الحقل</span>');
            error_flag = false;
        }else{
            $(this).find($('.error')).remove();
        }
                       
        return error_flag;
    });
});
