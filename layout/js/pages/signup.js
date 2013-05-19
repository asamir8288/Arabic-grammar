$(document).ready(function(){
    $('#grade_id').change(function(){
        if($(this).val() == 4){
            $.get(site_url() + 'site/get_grade_years/' + $(this).val(), function(data){
                $('.academic_years').html(data);
                $('.academic_years').slideDown();
                $('.specialization').slideDown();
            });
        }else{
            $('.academic_years').slideUp();
            $('.specialization').slideUp();
        }
    });
    
    $(".signup_form").validate({
        debug: false,
        rules: {
            name: "required",                      
            email: {
                required: true,
                email: true
            },
            password: "required",
            grade_id : "required"
        }            
    }); 
});