$(document).ready(function(){
    $('#type_id').change(function(){
        switch($('#type_id').val()){
            case '1':
                $.get(site_url() + 'admin/assessment/multiChoices', function(data){
                    $('#question_type').html(data);
                });
                break;
            case '2':
                $.get(site_url() + 'admin/assessment/pressOnCorrectAnswer', function(data){
                    $('#question_type').html(data);
                });                    
                break;
            case '3':
                $.get(site_url() + 'admin/assessment/dragAndDrop', function(data){
                    $('#question_type').html(data);
                });
                break;
            case '4':
                $.get(site_url() + 'admin/assessment/dropdownsQuestion', function(data){
                    $('#question_type').html(data);
                });
                break;
        }
    });
        
    var question_id = $('.question_id').val();
        
    if(question_id != '0'){
        switch($('#type_id').val()){
            case '1':
                $.get(site_url() + 'admin/assessment/multiChoices/' + question_id, function(data){
                    $('#question_type').html(data);
                });
                break;
            case '2':
                $.get(site_url() + 'admin/assessment/pressOnCorrectAnswer/' + question_id, function(data){
                    $('#question_type').html(data);
                }); 
                break;
            case '3':
                $.get(site_url() + 'admin/assessment/dragAndDrop/' + question_id, function(data){
                    $('#question_type').html(data);
                });
                break;
            case '4':
                $.get(site_url() + 'admin/assessment/dropdownsQuestion/' + question_id, function(data){
                    $('#question_type').html(data);
                });
                break;
        }
    }  
        
        
    $(".form-inline").validate({
        debug: false,
        rules: {
            type_id: "required",                      
            difficulty_level: "required",
            interest_grammatical: "required"               
        }            
    }); 
        
    $('.form-inline').submit(function(){
        var error_flag = true;
        switch($('#type_id').val()){
            case '1':
            case '2':
            case '4':
                if($('#question').val() == ''){
                    $('#question').after('<span generated="true" class="error" style="">من فضلك ادخل هذا الحقل</span>');
                    error_flag = false;
                }else{
                    $('#question').find($('.error')).remove();
                }
                    
                if($('.myTag').length == 0){                        
                    $('.tagManager').after('<span generated="true" class="error" style="display: block;top: 5px;position: relative;">من فضلك ادخل هذا الحقل</span>');
                    error_flag = false;
                }
                    
                if($('#feedback_1').length == 0){                        
                    $('#feedback').after('<span generated="true" class="error" style="position: relative;top: 4px;clear: both;position: relative;top: 4px;display: block;float: right;margin-right: 157px;">من فضلك ادخل هذا الحقل</span>');
                    error_flag = false;
                }else{
                    $('#feedback').find($('.error')).remove();
                }
                break;
                
            case '3':
                if($('#question_1').length == 0){                        
                    $('.template1').after('<span generated="true" class="error" style="display: block;top: 5px;position: relative;">من فضلك ادخل هذا الحقل</span>');
                    error_flag = false;
                }else{
                    $('.template1').find($('.error')).remove();
                }
                    
                if($('#answer_text_1').length == 0){                        
                    $('.template2').after('<span generated="true" class="error" style="display: block;top: 5px;position: relative;">من فضلك ادخل هذا الحقل</span>');
                    error_flag = false;
                }else{
                    $('.template2').find($('.error')).remove();
                }
                    
                // here we will check if the template 1 records are the same with template 2 or not
                if($('#answer_text_1').length != $('#question_1').length){   
                    alert('النموذج أ لا يماثل النمودج ب');
                }
                break;
                
        }
        return error_flag;
    });
});