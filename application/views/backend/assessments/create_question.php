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
    });
</script>

<?php echo form_open($submit_url, 'class="form-inline"'); ?>
<ul>
    <li class="field-group">
        <label class="form-label" for="">نمط الاختبار :</label>
        <div class="select-options-wrapper">
            <select class="custom-select" id="type_id" name="type_id">
                <option value="">اختار</option>
                <?php foreach ($questionTypes as $item) { ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                <?php } ?>
            </select>
        </div>        
    </li>

    <li class="field-group">
        <label class="form-label" for="">حدد درجة الصعوبة :</label>
        <div class="select-options-wrapper">
            <select class="custom-select" id="q_difficulty" name="difficulty_level">
                <option value="">اختار</option>
                <?php foreach ($questionDiffeculty as $item) { ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                <?php } ?>
            </select>
        </div>        
    </li>

    <div id="question_type">

    </div>  

    <li class="field-group">
        <label class="form-label" for="">التغذية الراجعة :</label>
        <textarea type="text" name="feedback" id="feedback" ></textarea>
    </li>
    <li class="field-group">
        <label class="form-label" for="">فائدة نحوية :</label>
        <textarea type="text" name="interest_grammatical" id="feedback" ></textarea>
    </li>

    <li class="btns">
        <?php echo form_submit('submit', 'اضافة سؤال', 'class="submit-btn"') ?>
        <a href="<?php echo site_url('admin/assessment/manage_questions/' . $this->uri->segment(4)); ?>">الغاء</a>
    </li>

</ul>
<?php echo form_close(); ?>

<div style="clear: both;height: 10px;"></div>