<?php echo form_open('', 'class="contact_us"'); ?>
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
        <label class="form-label" for="">العنوان :</label>
        <textarea type="text" name="address" style="width: 217px;height: 39px;" ></textarea>
    </li>            
    <li class="field-group">
        <label class="form-label" for="">رقم الهاتف :</label>
        <input type="text" name="phone">
    </li>            
    <li class="field-group">
        <label class="form-label" for="">الرسالة :</label>
        <textarea type="text" name="message" style="height: 100px;" ></textarea>
    </li>            
    <li class="btns">
        <?php echo form_submit('submit', 'ارسال', 'class="submit-btn"') ?>
    </li>
</ul>
<?php echo form_close(); ?>