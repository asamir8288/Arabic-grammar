<div class="same-exam-details">
    <div style="margin-top: 30px;margin-bottom: 20px;"><span class="sub_title">اسم الاختبار</span>: <?php echo $assessments[0]['Assessments']['name']; ?></div>
    <div style="margin-bottom: 20px;"><span class="sub_title">الوصف: </span> <?php echo $assessments[0]['Assessments']['description']; ?></div>
    <div style="margin-bottom: 20px;"><span class="sub_title">عدد مرات اجتياز الاختبار: </span> <?php echo count($assessments); ?></div>
    <div><span class="sub_title">التفاصيل: </span>
        <?php foreach ($assessments as $exam) { ?>
            <p>
                بتاريخ: <?php echo substr($exam['created_at'], 0, 10); ?>
            </p>
            <p>
                حصل على نسية:
                <?php
                $score = calc_score($exam['id']);
                if ($score >= 0 && $score < 50) {
                    echo '<span style="color: #FF0000;font-weight: bold;">' . $score . '</span>';
                } else if ($score >= 50 && $score < 70) {
                    echo '<span style="color: #ffba00;font-weight: bold;">' . $score . '</span>';
                } else if ($score > 70) {
                    echo '<span style="color: #16bd00;font-weight: bold;">' . $score . '</span>';
                }
                echo ' <span><b>ملحوظة: </b> يتم حساب النسبة المئوية على حسب صعوبة كل سؤال حيث ان الاسئلة متاوتة الصعوبة ولكل مستوى من الصعوبة عامل يتم حساب النسبة المئوية على اساسه</span>'
                ?>
            </p>
            <p>
                <?php echo 'لقد تم الاجابة على عدد ' . numOfCorrectAnswer($exam['id']) . ' سؤال بشكل صحيح من ' . count($exam['UserAssessmentAnswers']) . ' اسئلة'; ?>
            </p>
            <div style="border-bottom: 1px dashed #CCC;margin: 10px 0px;"></div>
        <?php } ?>
    </div>
</div>