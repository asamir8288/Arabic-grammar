<?php echo form_open($submit_url); ?>
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