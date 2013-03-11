<script type="text/javascript">
    $(document).ready(function(){
        $('form').submit(function(){           
            var questions_number = $('#questions_number').val();
            var available_questions = $('#available_questions').html();
            
            if(available_questions < questions_number){                
                $('.error').html('رجاء اختيار عدد ' + available_questions + ' أسئلة أو أقل');
                return false;
            }else{
                return true;
            }
            
        });                
    });
</script>

<div style="margin-top: 30px;width: 600px;">
    
    <h1 style="margin-right: -10px;">الاختبار الأول: <span><?php echo $assessment['Assessments']['name']; ?></span></h1>

    <div class="h-line" style="margin-top: 0px;"></div>

    <div>
        <h1 style="margin-right: -10px;"><?php echo $assessment['Assessments']['name']; ?></h1>
        <p>
            <?php echo $assessment['Assessments']['description']; ?>
        </p>
    </div>

    <div class="h-line"></div>

    <p>يحتوى <?php echo (isset($type)) ? 'الاختبار': 'التدريب';?> على <strong style="text-decoration: underline;"><?php echo '<span id="available_questions">' . $assessment['assessment_question'] . '</span>'; ?> أسئلة</strong> متفاوتة الصعوبة</p>        
</div>

<?php echo form_open($submit_url); ?>
<ul>
    <li class="field-group">
        <input type="hidden" name="user_assessment_id" value="<?php echo $assessment['id']; ?>">
        <input type="hidden" name="assessment_id" value="<?php echo $assessment['Assessments']['id']; ?>">
        <label class="label-name" for="">حدد عدد الاسئلة التي تريد <?php echo (isset($type)) ? 'الاختبار': 'التدريب';?> عليها :</label> 
        <input style="width: 80px;float: none;" type="text" name="questions_number" id="questions_number">
        <span class="error" style="font-weight: normal;"></span>
    </li>
</ul>

<div style="clear: right;"></div>
<div style="width: 430px;margin: 0 auto;margin-top: 0px;">   
    <?php 
        if(isset($type)){
            echo form_submit('submit', ' ', 'class="start-current-exam"');
        }else{
            echo form_submit('submit', ' ', 'class="start-current-training"');
        }
    ?>
</div>
<?php echo form_close(); ?>
