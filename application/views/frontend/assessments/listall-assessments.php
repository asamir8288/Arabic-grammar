<div id="menu_groups">
    <div class="assessment-menu-items">
        <?php foreach ($mainMenu as $main_item) { ?>
            <a menu_id="<?php echo $main_item['id']; ?>" class="assessment-btn"><?php echo $main_item['name']; ?></a>
        <?php } ?>    
    </div>
</div>

<div class="assessment-menu-separator"></div>

<div id="assessment-list"> 
    <input type="hidden" name="assessment_count" id="assessment_count" value="<?php echo count($userAssessment);?>" />
    <h1>التدريبات المختارة</h1>
    <?php
    if (count($userAssessment)) {
        foreach ($userAssessment as $assessment) {
            echo '<div class="assessment-name-box">' . $assessment['Assessments']['name'] . '</div>';
        }
    }
        ?>
    <span class="no-assessment">لا يوجد تدريبات مختارة</span>

        <a href="<?php echo site_url('assessment/my_assessments');?>" class="start-trainings"></a>
</div>