<ol class="ocq-main-list-wrapper">
    <?php
    $answers = explode(',', $q['QuestionAnswers'][0]['answer_text']);
    $feedbacks = explode(',', $q['QuestionAnswers'][0]['feedback']);

    $answer_with_feedback = array();
    for ($i = 0; $i < count($answers); $i++) {
        $feedback = '';
        if (isset($feedbacks[$i])) {
            $feedback = $feedbacks[$i];
        }
        $answer_with_feedback[] = $answers[$i] . ',' . $feedback;
    }
    $answers = shuffle_assoc($answer_with_feedback);
    ?>
    <li class="ocq-main-list">
        <span class="ocq-question">
            <?php echo $q['question']; ?>
        </span>
        <ul class="ocq-inner-list-wrapper">

            <?php
            for ($i = 0; $i < count($answers); $i++) {
                $answer = explode(',', $answers[$i]);
                ?>
                <li class="ocq-inner-list">
                    <input type="radio" name="q1" class="ocq-radio-btn"/>
                    <label><?php echo $answer[0]; ?></label>
                    <?php if ($answer[0] == $q['QuestionAnswers'][0]['correct_answer']) { ?>
                        <span class="ocq-question-answer ocq-correct-answer" >(أحسنت, اجابة صحيحة)</span>
                        <?php
                    } else {
                        if ($answer[1] != '') {
                            ?>
                            <span  class="ocq-question-answer ocq-wrong-answer" >(<?php echo $answer[1]; ?>)</span>
                            <?php
                        }
                    }
                    ?>
                </li>
            <?php } ?>                       
        </ul>
    </li>
</ol>

<?php
if (!is_null($q['QuestionAnswers'][0]['interest_grammatical']) && !empty($q['QuestionAnswers'][0]['interest_grammatical']))
    echo $q['QuestionAnswers'][0]['interest_grammatical'];
?>

<a href="<?php echo site_url('question/' . $this->uri->segment(2) . '/' . $q['id']); ?>" class="next"></a>