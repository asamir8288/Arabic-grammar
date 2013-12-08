<ul class="b-list">
    <?php
    $template1 = explode(',', $q['question']);
    $answers = explode(',', $q['QuestionAnswers'][0]['answer_text']);
    
    ?>
    <?php for ($i = 0; $i < count($template1); $i++) { ?>
        <li class="b-list-item" question-index="<?php echo $answers[$i]; ?>">
            <span></span>
            <?php echo $template1[$i]; ?></li>    
    <?php } ?>
</ul>

<ul class="a-list">
    <?php
    $answers = shuffle_assoc($answers);
    for ($i = 0; $i < count($answers); $i++) {
        ?>
        <li class="a-list-item" correct-answer="<?php echo $answers[$i] ?>">
            <span></span>
            <?php echo $answers[$i] ?></li>
    <?php } ?>

</ul>

<div style="clear: both; height: 10px;"></div>
<div class="h-line"></div>

<?php
if (!is_null($q['QuestionAnswers'][0]['interest_grammatical']) && !empty($q['QuestionAnswers'][0]['interest_grammatical']))
    echo $q['QuestionAnswers'][0]['interest_grammatical'];
?>

<a href="<?php echo site_url('question/' . $this->uri->segment(2). '/' . $q['id']);?>" class="next"></a>