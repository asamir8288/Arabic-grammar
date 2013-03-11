<?php echo form_open($submit_url); ?>
<ol class="ocq-main-list-wrapper">
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