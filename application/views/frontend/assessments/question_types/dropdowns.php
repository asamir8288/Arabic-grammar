
<?php
$answers = explode(',', $q['QuestionAnswers'][0]['answer_text']);
$feedbacks = explode(',', $q['QuestionAnswers'][0]['feedback']);

//    preg_match("/\(([^\)]*)\)/", $dropdowns, $Matches);
//    var_dump($Matches);
?>

<div class="dropdown-questions-wrapper">

    <p class="dropdown-question-main-paragraph">
        <?php
        $Matches = explode(' ', $q['question']);
        foreach ($Matches as $match) {
            if (preg_match("/\(([^\)]*)\)/", $match)) {
                $text = $match;

                $start = strpos($match, "(");
                $end = strpos($match, ")");

                $choices = explode('/', substr($text, $start + 1, $end - $start - 1));
                ?>
                <span class="dropdown-select-wrapper">
                    <span class="empty-line-item">------</span>
                    <select class="dropdown-item">
                        <option value="empty-dropdown-answer"> -- </option>
                        <?php
                        foreach ($choices as $choice) {
                            if(in_array($choice, $answers)){
                                echo '<option value="correct-dropdown-answer">'. $choice .'</option>';
                            }else{
                               echo '<option value="wrong-dropdown-answer">'. $choice .'</option>'; 
                            }
                            
                        }
                        ?>
                    </select>
                </span>
                <?php
            } else {
                echo $match . ' ';
            }
        }
        ?>
    </p>	
</div>

<div style="clear: both;border-bottom: 1px solid rgb(218, 218, 218);width: 100%; height: 1px;margin-bottom: 10px;"></div>

<?php
if (!is_null($q['QuestionAnswers'][0]['interest_grammatical']) && !empty($q['QuestionAnswers'][0]['interest_grammatical']))
    echo $q['QuestionAnswers'][0]['interest_grammatical'];
?>

<a href="<?php echo site_url('question/' . $this->uri->segment(2) . '/' . $q['id']); ?>" class="next"></a>