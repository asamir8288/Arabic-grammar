<?php echo form_open($submit_url); ?>
<div class="timerWrapper">	
    <div class="border-3 shadow-4 timer active">				
        <div class="timer_meter" style="overflow: hidden; width: 100%; ">
            <div class="timer_value" style="color:#ffffff; whitespace: nowrap;"><span class='count'></span></div>
        </div>
    </div>
</div>


<div class="resultWrapper" >	
    <?php echo form_submit('submit', 'السؤال التالى', 'style="padding: 6px 17px;font-weight: bold;color: blue;font-size: 14px;position: relative;top: 4px;"');?>
</div>
<div class="question-block">
<h2>عيّن مواضع الخطأ في العبارات التالية بالنقر عليها:</h2>
<ol class="ocq-main-list-wrapper">
    <?php
    $answers = explode(',', $q['QuestionAnswers'][0]['answer_text']);
    $feedbacks = explode(',', $q['QuestionAnswers'][0]['feedback']);        
    ?>
    <li class="ocq-main-list">
        <input type="hidden" name="q1" id="user_answer" value="" />
        <input type="hidden" name="qId" value="<?php echo $q['id']; ?>" />
        <input type="hidden" name="ua_id" value="<?php echo $q['Assessments']['UserAssessments'][0]['id']; ?>" />
        
        <p class="choose-each-question-main-paragraph">
            <?php 
            $question_words = explode(' ', $q['question']); 
            for($i =0;$i <count($question_words);$i++){                
                    echo '<span class="normal-span-answer">'.$question_words[$i].'</span> ';
            }
            ?>
        </p>        
    </li>
</ol>

<?php echo form_submit('submit', ' ', 'class="next"');?>
<?php echo form_close(); ?>

</div>