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

<ol class="ocq-main-list-wrapper question-block">
    <?php
    $answers = explode(',', $q['QuestionAnswers'][0]['answer_text']);

    $answers = shuffle_assoc($answers);
    ?>
    <li class="ocq-main-list">
        <input type="hidden" name="qId" value="<?php echo $q['id']; ?>" />
        <input type="hidden" name="ua_id" value="<?php echo $q['Assessments']['UserAssessments'][0]['id']; ?>" />
        <span class="ocq-question">
            <?php echo $q['question']; ?>
        </span>
        <ul class="ocq-inner-list-wrapper">

            <?php for ($i = 0; $i < count($answers); $i++) { ?>
                <li class="ocq_exam-inner-list">
                    <input type="radio" name="q1" value="<?php echo $answers[$i]; ?>" class="ocq-radio-btn"/>
                    <label><?php echo $answers[$i]; ?></label>
                </li>
            <?php } ?>                       
        </ul>
    </li>
</ol>

<?php echo form_submit('submit', ' ', 'class="next"');?>
<?php echo form_close(); ?>