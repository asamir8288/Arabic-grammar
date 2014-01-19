<?php if (count($exam)) { ?>
<p style="margin-top: 30px;margin-bottom: 20px;font-size: 16px;">
        لقد حصلت على نسبة:
        <?php
        $score = calc_score($exam[0]['user_assessment_id']);
        if ($score >= 0 && $score < 50) {
            echo '<span style="color: #FF0000;font-weight: bold;font-size: 22px;">' . $score . '</span>';
        } else if ($score >= 50 && $score < 70) {
            echo '<span style="color: #ffba00;font-weight: bold;font-size: 22px;">' . $score . '</span>';
        } else if ($score > 70) {
            echo '<span style="color: #16bd00;font-weight: bold;font-size: 22px;">' . $score . '</span>';
        }
        ?>
    </p>

    <?php
    foreach ($exam as $e) {
        $style = 'style="color: #148D04;margin-bottom: 10px;"';
        if(!$e['correct_answer']){
            $style = 'style="color: #FF0000;margin-bottom: 10px;"';
        }
        $title = '';
        $html = $e['Questions']['question'];
        if ($e['Questions']['type_id'] == 3) {
            $title = 'نمط السؤال: السحب والادراج <br />';
            $column1 = explode(',', $e['Questions']['question']);
            $column2 = explode(',', $e['Questions']['QuestionAnswers'][0]['correct_answer']);
            $html = '';
            for ($i = 0; $i < count($column1); $i++) {
                $html .= $column1[$i] . ' : '. $column2[$i] . '<br/>';
            }
        }else if($e['Questions']['type_id'] == 2){
            $title = 'النقر على الإجابة الصحيحة <br />';
            $html = $e['Questions']['question'] . ' (' . $e['Questions']['QuestionAnswers'][0]['correct_answer'] . ')';
        }else if($e['Questions']['type_id'] == 1){
            $title = 'نمط السؤال: اختيار من متعدد<br />';
            $html = $e['Questions']['question'] . ' (' . $e['Questions']['QuestionAnswers'][0]['correct_answer'] . ')';
        }elseif($e['Questions']['type_id'] == 4){
            $title = 'نمط السؤال: ملئ الفراغ<br />';
        }
        echo '<div '.$style.'><span style="color: #000;">' . $title . '</span>'.  $html . '</div>';
    }
    ?>
<?php } ?>