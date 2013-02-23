<div style="margin-top: 30px;width: 600px;">
    <h1 style="margin-right: -10px;">الاختبار الأول: <span><?php echo $assessment['Assessments']['name']; ?></span></h1>

    <div class="h-line" style="margin-top: 0px;"></div>

    <div>
        <h1 style="margin-right: -10px;"><?php echo $assessment['Assessments']['name']; ?></h1>
        <p>
            <?php echo $assessment['Assessments']['description']; ?>
        </p>
    </div>

    <div class="h-line"></div>

    <p>يحتوى التدريب على <strong style="text-decoration: underline;"><?php echo $assessment['assessment_question']; ?> أسئلة</strong> متفاوتة الصعوبة</p>        
</div>

<?php echo form_open($submit_url); ?>
<ul>
    <li class="field-group">
        <input type="hidden" name="user_assessment_id" value="<?php echo $assessment['id']; ?>">
        <input type="hidden" name="assessment_id" value="<?php echo $assessment['Assessments']['id']; ?>">
        <label class="label-name" for="">حدد عدد الاسئلة التي تريد التدريب عليها :</label> 
        <input style="width: 80px;float: none;" type="text" name="questions_number">
    </li>
</ul>

<div style="clear: right;"></div>
<div style="width: 430px;margin: 0 auto;margin-top: 0px;">
    <?php echo form_submit('submit', ' ', 'class="start-current-training"')?>
</div>
<?php echo form_close(); ?>
