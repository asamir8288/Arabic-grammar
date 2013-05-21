<?php echo form_open(''); ?>
<ul>
    <li class="field-group">
        <label class="form-label" for="username">اسم المستخدم :</label>
        <input type="text" name="username" id="username" >
    </li>

    <li class="field-group">
        <label class="form-label" for="password">كلمة المرور :</label>
        <input type="password" name="password" id="password" >
    </li>
    

    <li class="btns">
        <?php echo form_submit('submit', 'تسجيل الدخول', 'class="submit-btn"') ?>        
    </li>

</ul>
<?php echo form_close(); ?>