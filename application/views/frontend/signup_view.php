<div class="main_title">تسجيل مستخدم جديد</div>

<p>
    رجاء ملء كافة البيانات التالية لنتمكن من إنشاء حساب مجانى  جديد لك 
</p>
<?php echo form_open('', 'class="signup_form"'); ?>
<ul>
    <li class="field-group">
        <label class="form-label" for="">الاسم :</label>
        <input type="text" name="name">
    </li>
    <li class="field-group">
        <label class="form-label" for="">البريد الالكتروني :</label>
        <input type="text" name="email">
    </li>
    <li class="field-group">
        <label class="form-label" for="">كلمة المرور :</label>
        <input type="password" name="password">
    </li>   
    <li class="field-group">
        <label class="form-label" for="">المرحلة الدراسية :</label>
        <div class="select-options-wrapper">
            <select class="custom-select" id="grade_id" name="grade_id">
                <option value="">اختر</option>
                <?php foreach($grades as $grade){ ?>
                    <option value="<?php echo $grade['id'];?>"><?php echo $grade['name'];?></option>
                <?php }?>
            </select>
        </div>        
    </li>
    <li class="academic_years" style="clear: both;display: none;"></li>
    <li class="field-group specialization" style="clear: both;display: none;">
        <label class="form-label" for="">التخصص :</label>
        <input type="text" name="specialization">
    </li>
    <li class="btns">
        <?php echo form_submit('submit', 'إنشاء حساب جديد', 'class="submit-btn"') ?>
    </li>
</ul>
<?php echo form_close(); ?>