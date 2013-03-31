<h2>عيّن مواضع الخطأ في العبارات التالية بالنقر عليها:</h2>
<ol class="ocq-main-list-wrapper">
    <?php
    $answers = explode(',', $q['QuestionAnswers'][0]['answer_text']);
    $feedbacks = explode(',', $q['QuestionAnswers'][0]['feedback']);        
    ?>
    <li class="ocq-main-list">
        <p class="choose-each-question-main-paragraph">
            <?php 
            $question_words = explode(' ', $q['question']); 
            $n = 0;
            for($i =0;$i <count($question_words);$i++){
                if(trim($question_words[$i]) == trim($answers[$n])){
                    echo '<span class="normal-span-answer" value="correct answer" answer="'. $feedbacks[$n] .'">'.$question_words[$i].'</span> ';                    
                    $n++;
                    if(count($answers) == $n){
                        $n--;                        
                    }
                }else{
                    echo '<span class="normal-span-answer">'.$question_words[$i].'</span> ';
                }
            }
            ?>
        </p>        
    </li>
</ol>

<a href="<?php echo site_url('question/' . $this->uri->segment(2). '/' . $q['id']);?>" class="next"></a>