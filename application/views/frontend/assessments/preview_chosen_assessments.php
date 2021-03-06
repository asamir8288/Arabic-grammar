<?php
$assessment_type = 'لقد اخترت اجراء التدريبات التالية';
$assessment_type_msg = 'كل تدريب يحتوى على عدد كافي من الأسئلة متفاوتة الصعوبة ومتوسط زمن إجابة كل سؤال دقيقة واحد';
$assessment_type_url = 'assessment/detials';
$assessment_type_other_url = 'assessment/listall';
$assessments_completed = "تدريبات";

if (isset($type) && $type == '1') {
    $assessment_type = 'لقد اخترت اجراء الاختبارات التالية';
    $assessment_type_msg = 'كل اختبار يحتوى على عدد كافي من الأسئلة متفاوتة الصعوبة ومتوسط زمن إجابة كل سؤال دقيقة واحد';
    $assessment_type_url = 'exam/detials';
    $assessment_type_other_url = 'exam/listall';
    $assessments_completed = "اختبارات";
}
?>

<div style="">
    <div style="margin-top: 30px;"></div>
    <h1 style="margin-right: -10px;"><?php echo $assessment_type; ?>: </h1>
    <?php
    if (count($userAssessment)) {
        $exams = array('');
        foreach ($userAssessment as $assessment) {
            if (!in_array($assessment['Assessments']['name'], $exams)) {
                $class = 'assessment-name-box-inside';
                if ($assessment['completed']) {
                    $class = 'completed_assessment-inside';
                }
                if (isset($type) && $type == '1') {
                    echo '<a href="' . site_url('exam/results/' . $assessment['assessment_id']) . '" style="cursor: pointer;" class="' . $class . '">' . $assessment['Assessments']['name'] . '</a>';
                } else {
                    echo '<a href="' . site_url('assessment/results/' . $assessment['assessment_id']) . '" style="cursor: pointer;" class="' . $class . '">' . $assessment['Assessments']['name'] . '</a>';
                }
                $exams[] = $assessment['Assessments']['name'];
            }
        }
    }
    ?>
</div>

<?php if (!$allCompleted) { ?>
    <div style="margin-top: 30px;">
        <?php echo $assessment_type_msg; ?>
    </div>

    <div style="width: 480px;margin: 0 auto;">
        <?php if (!isset($previously)) { ?>
            <a href="<?php echo site_url($assessment_type_url); ?>" class="next"></a>
        <?php } ?>
    </div>

<?php } else { ?>
    <div style="margin-top: 30px;">
        لقد أتممت جميع ال<?php echo $assessments_completed; ?> السابقة
        يمكنك اختيار
        <a href="<?php echo site_url($assessment_type_other_url); ?>"><?php echo $assessments_completed; ?> أخري</a>
        أو العودة الى 
        <a href="<?php echo site_url('dashboard'); ?>">الصفحة الرئيسية</a>
    </div>
<?php } ?>

