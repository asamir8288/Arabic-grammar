<?php echo form_open(''); ?>
<ul>
    <li class="field-group">
        <label class="form-label" for="page_title">عنوان الصفحة :</label>
        <input type="text" name="page_title" id="page_title" value="<?php echo isset($page['page_title'])? $page['page_title'] : '';?>">
    </li>

    <li class="field-group">
        <label class="form-label" for="page_content">محتوى الصفحة :</label>
        <textarea type="text" name="content" id="page_content" style="width: 550px;height: 350px;" ><?php echo isset($page['content'])? $page['content'] : '';?></textarea>
    </li>
    

    <li class="btns">
        <?php echo form_submit('submit', 'حفظ', 'class="submit-btn"') ?>        
    </li>

</ul>
<?php echo form_close(); ?>