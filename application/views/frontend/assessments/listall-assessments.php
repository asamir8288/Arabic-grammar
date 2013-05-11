<script type="text/javascript">
    $(document).ready(function() {                
        $('#q').autocomplete({
            minLength: 1,
            source: function(req, add){
                $.ajax({
                    url: site_url() + 'assessment/auto_complete',
                    dataType: 'json',
                    type: 'POST',
                    data: req,
                    success: function(data){
                        if(data.response =='true'){                           
                            add(data.message);
                        }
                    }
                });
            }
        });                
    });
</script>
<form method="GET" action="<?php echo base_url(); ?>assessment/auto_complete">
    <a href="" class="search"></a>
    <input type="text" name="q" id="q" class="search-txtbox">
    <a href="" class="search-btn"></a>
</form>
<div class="clear" style="height: 45px;"></div>

<div class="assessment-section-separator"></div>

<div id="menu_groups">
    <div class="assessment-menu-items">
        <?php foreach ($mainMenu as $main_item) { ?>
            <a menu_id="<?php echo $main_item['id']; ?>" class="assessment-btn"><?php echo $main_item['name']; ?></a>
        <?php } ?>    
    </div>
</div>

<div class="assessment-section-separator"></div>

<div id="assessment-list"> 
    <input type="hidden" name="assessment_count" id="assessment_count" value="<?php echo count($userAssessment); ?>" />

    <?php
    $assessment_type = 'التدريبات المختارة';
    $assessment_type_msg = 'لا يوجد تدريبات مختارة';
    $assessment_type_class = 'start-trainings';
    $assessment_type_url = 'assessment/my_assessments';

    if (isset($type) && $type == '1') {
        $assessment_type = 'الاختبارات المختارة';
        $assessment_type_msg = 'لا يوجد اختبارات مختارة';
        $assessment_type_class = 'start-exams';
        $assessment_type_url = 'exam/my_exams';
    }
    ?>

    <h1><?php echo $assessment_type; ?></h1>
    <?php
    if (count($userAssessment)) {
        foreach ($userAssessment as $assessment) {
            echo '<div class="assessment-name-box">' . $assessment['Assessments']['name'] . '</div>';
        }
    }
    ?>
    <span class="no-assessment"><?php echo $assessment_type_msg; ?></span>

    <a href="<?php echo site_url($assessment_type_url); ?>" class="<?php echo $assessment_type_class; ?>"></a>       
</div>