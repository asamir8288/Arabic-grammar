<div style="width: 600px;">
    <div style="margin-top: 30px;"></div>
    <h1 style="margin-right: -10px;">لقد اخترت اجراء التدريبات التالية: </h1>
    <?php
    if (count($userAssessment)) {
        foreach ($userAssessment as $assessment) {
            $class = 'assessment-name-box-inside';
            if($assessment['completed']){
                $class = 'completed_assessment-inside';
            }
            echo '<div class="'. $class .'">' . $assessment['Assessments']['name'] . '</div>';
        }
    }
    ?>
</div>

<?php if(!$allCompleted) {?>
<div style="margin-top: 30px;">
    كل تدريب يحتوى على عدد كافي من الأسئلة متفاوتة الصعوبة ومتوسط زمن إجابة كل سؤال دقيقة واحدة
</div>

<div style="width: 480px;margin: 0 auto;">
    <a href="<?php echo site_url('assessment/detials');?>" class="next"></a>
</div>

<?php }else{ ?>
<div style="margin-top: 30px;">
   لقد أتممت جميع التدريبات السابقة
   يمكنك اختيار
   <a href="<?php echo site_url('assessment/listall');?>">تدريبات أخري</a>
   أو العودة الى 
   <a href="<?php echo site_url('dashboard');?>">الصفحة الرئيسية</a>
</div>
<?php } ?>

