<style type="text/css">
    .feedback-tags .myTag{
        margin-right: 158px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $('#type_id').change(function(){
            switch($('#type_id').val()){
                case '1':
                    $.get(site_url() + 'admin/assessment/multiChoices', function(data){
                        $('#question_type').html(data);
                    });
                    break;
                case '2':
                    alert('2');
                    break;
                case '3':
                    $.get(site_url() + 'admin/assessment/dragAndDrop', function(data){
                        $('#question_type').html(data);
                    });
                    break;
                case '4':
                    alert('4');
                    break;
            }
        });
        
        var question_id = $('.question_id').val();
        
        if(question_id != '0'){
            switch($('#type_id').val()){
                case '1':
                    $.get(site_url() + 'admin/assessment/multiChoices/' + question_id, function(data){
                        $('#question_type').html(data);
                    });
                    break;
                case '2':
                    alert('2');
                    break;
                case '3':
                    $.get(site_url() + 'admin/assessment/dragAndDrop/' + question_id, function(data){
                        $('#question_type').html(data);
                    });
                    break;
                case '4':
                    alert('4');
                    break;
            }
        }        
    });
</script>

<?php echo form_open($submit_url, 'class="form-inline"'); ?>
<input type="hidden" name="question_id" class="question_id" value="<?php echo (isset($question)) ? $question['id'] : '0'; ?>" />
<input type="hidden" name="ass_id" class="ass_id" value="<?php echo (isset($question)) ? $question['assessment_id'] : ''; ?>" />
<ul>
    <li class="field-group">
        <label class="form-label" for="">نمط الاختبار :</label>
        <div class="select-options-wrapper">
            <select class="custom-select" id="type_id" name="type_id">
                <option value="">اختر</option>
                <?php
                foreach ($questionTypes as $item) {
                    if (isset($question) && $question['type_id'] == $item['id']) {
                        ?>
                        <option selected="selected" value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>        
    </li>

    <li class="field-group">
        <label class="form-label" for="">حدد درجة الصعوبة :</label>
        <div class="select-options-wrapper">
            <select class="custom-select" id="q_difficulty" name="difficulty_level">
                <option value="">اختر</option>
                <?php foreach ($questionDiffeculty as $item) {
                    if (isset($question) && $question['difficulty_level'] == $item['id']) {
                        ?>
                <option selected="selected" value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
    <?php }
} ?>
            </select>
        </div>        
    </li>

    <div id="question_type">

    </div>  

    <li class="field-group feedback-tags">
        <label class="form-label" for="">التغذية الراجعة :</label>
        <textarea type="text" name="feedback" id="feedback" class="tagfeedback" ></textarea>
    </li>
    <li class="field-group">
        <label class="form-label" for="">فائدة نحوية :</label>
        <textarea type="text" name="interest_grammatical" id="feedback" ><?php echo (isset($question)) ? trim($question['QuestionAnswers'][0]['interest_grammatical']) : ''; ?></textarea>
    </li>

    <li class="btns">
<?php echo form_submit('submit', 'اضافة سؤال', 'class="submit-btn"') ?>
        <a href="<?php echo (isset($question)) ? site_url('admin/assessment/manage_questions/' .$question['assessment_id']) : site_url('admin/assessment/manage_questions/' . $this->uri->segment(4)); ?>">الغاء</a>
    </li>

</ul>
<?php echo form_close(); ?>

<div style="clear: both;height: 10px;"></div>
<?
$feedback_tags = '';
if (isset($question)) {
    $feedbacks = explode(',', $question['QuestionAnswers'][0]['feedback']);

    for ($i = 0; $i < count($feedbacks); $i++) {
        $feedback_tags .= '"' . $feedbacks[$i] . '", ';
    }
}
?>
<script type="text/javascript">               
    jQuery(".tagfeedback:eq(0)").tagsManager({
        prefilled: [<?php echo $feedback_tags; ?>],
        preventSubmitOnEnter: true,
        typeahead: true,
        typeaheadAjaxSource: null,                    
        blinkBGColor_1: '#FFFF9C',
        blinkBGColor_2: '#CDE69C',
        hiddenTagListName: 'feedback'
    });                
</script>