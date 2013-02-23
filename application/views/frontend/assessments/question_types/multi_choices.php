<ol class="ocq-main-list-wrapper">
    <?php
    $answers = explode(',', $q['QuestionAnswers'][0]['answer_text']);

    $answers = shuffle_assoc($answers);
    ?>
    <li class="ocq-main-list">
        <span class="ocq-question">
            <?php echo $q['question']; ?>
        </span>
        <ul class="ocq-inner-list-wrapper">

            <?php for ($i = 0; $i < count($answers); $i++) { ?>
                <li class="ocq-inner-list">
                    <input type="radio" name="q1" class="ocq-radio-btn"/>
                    <label><?php echo $answers[$i]; ?></label>
                    <?php if ($answers[$i] == $q['QuestionAnswers'][0]['correct_answer']) { ?>
                        <span class="ocq-question-answer ocq-correct-answer" >(أحسنت, اجابة صحيحة)</span>
                    <?php } else { ?>
                        <span  class="ocq-question-answer ocq-wrong-answer" >(<?php echo $q['QuestionAnswers'][0]['feedback']; ?>)</span>
                    <?php } ?>
                </li>
            <?php } ?>                       
        </ul>
    </li>
</ol>

<a href="<?php echo site_url('question/' . $this->uri->segment(2). '/' . $q['id']);?>" class="next"></a>