<?php echo form_open('', 'id="drag_drop_form"'); ?>
<ul class="b-list">
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