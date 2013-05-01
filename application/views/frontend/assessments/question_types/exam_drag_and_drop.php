<?php echo form_open('', 'id="drag_drop_form"'); ?>
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

<ul class="question-block b-list">
    <?php
    $template1 = explode(',', $q['question']);
    $answers = explode(',', $q['QuestionAnswers'][0]['answer_text']);
    
    ?>
   <?php
    $answers = shuffle_assoc($answers);
    for ($i = 0; $i < count($answers); $i++) {
        ?>
        <li class="b-list-item">
            <span></span>
            <?php echo trim($answers[$i]); ?></li>
    <?php } ?>
</ul>

<ul class="a-list">
     <?php for ($i = 0; $i < count($template1); $i++) { ?>
        <li class="a-list-item">
            <span></span>
            <?php echo $template1[$i]; ?></li>    
    <?php } ?>

</ul>

<div class="h-line"></div>

<input type="hidden" name="q1" id="user_answer" value="" />
<input type="hidden" name="qId" value="<?php echo $q['id']; ?>" />
<input type="hidden" name="ua_id" value="<?php echo $q['Assessments']['UserAssessments'][0]['id']; ?>" />

<?php echo form_submit('submit', ' ', 'class="next"');?>
<?php echo form_close(); ?>