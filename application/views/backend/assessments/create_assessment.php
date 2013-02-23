<?php echo form_open(); ?>
<ul>  
    <div id="menu_groups">
        <li class="field-group">
            <label class="form-label" for="">الابواب النحوية والصرفية :</label>
            <div class="select-options-wrapper">
                <select class="custom-select" id="menu_id" name="menu_id">
                    <option value="">اختار</option>
                    <?php foreach ($mainMenu as $item) { ?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                    <?php } ?>
                </select>
            </div>        
        </li>

    </div>
    <div style="clear: both;height: 1px;"></div>
    <div id="assessment_fields" style="display: none;">
        <li class="field-group">
            <label class="form-label" for="">اسم الامتحان :</label>
            <input type="text" name="name" id="name" />
        </li>
        
        <li class="field-group">
        <label class="form-label" for="">وصف الامتحان :</label>
        <textarea type="text" name="description" id="description" ></textarea>
    </li>

        <li class="field-group">
            <label class="form-label" for="">الوقت المحدد للامتحان :</label>
            <input type="text" name="assessment_time" />
        </li>

        <li class="field-group">
            <label class="form-label" for="">تفعيل الامتحان :</label>        
            <?php
            $checked = '';
            $chbox_value = 'no';
            ?>
            <div class="custom-checkbox<?php echo $checked; ?>"></div>                        
            <input type="hidden" name="published" class="hidden-availability" value="<?php echo $chbox_value; ?>" />        
        </li>
    </div>
    <li class="btns">
        <?php echo form_submit('submit', 'انشاء امتحان جديد', 'class="submit-btn"') ?>
        <a href="<?php echo site_url('admin/assessment');?>">الغاء</a>
    </li>
</ul>
<?php echo form_close(); ?>