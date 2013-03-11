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

<div style="width: 600px;">
    <div style="margin-top: 30px;"></div>
    <h1 style="margin-right: -10px;"><?php echo $assessment_type; ?>: </h1>
    <?php
    if (count($userAssessment)) {
        foreach ($userAssessment as $assessment) {
            $class = 'assessment-name-box-inside';
            $score = '';
            if ($assessment['completed']) {
                $class = 'completed_assessment-inside';
                if (isset($type) && $type == '1') {
                    $score = ' (' . calc_score($assessment['id']) . ')';
                }
            }
            echo '<div class="' . $class . '">' . $assessment['Assessments']['name'] . $score . '</div>';
        }
    }
    ?>
</div>

<?php if (!$allCompleted) { ?>
    <div style="margin-top: 30px;">
        <?php echo $assessment_type_msg; ?>
    </div>

    <div style="width: 480px;margin: 0 auto;">
        <a href="<?php echo site_url($assessment_type_url); ?>" class="next"></a>
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

