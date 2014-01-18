<?php if (count($exam)) { ?>
    <p>
        حصل على نسية:
        <?php
        $score = calc_score($exam[0]['user_assessment_id']);
        if ($score >= 0 && $score < 50) {
            echo '<span style="color: #FF0000;font-weight: bold;">' . $score . '</span>';
        } else if ($score >= 50 && $score < 70) {
            echo '<span style="color: #ffba00;font-weight: bold;">' . $score . '</span>';
        } else if ($score > 70) {
            echo '<span style="color: #16bd00;font-weight: bold;">' . $score . '</span>';
        }
        ?>
    </p>
    
    <?php foreach($exam as $e) {
        echo $e['Questions']['question'] . '<br />';
    }?>
<?php } ?>