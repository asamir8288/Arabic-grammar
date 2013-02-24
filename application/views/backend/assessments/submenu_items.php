<?php if(count($subMenuItems)){ ?>
     <li class="field-group">
        <label class="form-label" for=""></label>
        <div class="select-options-wrapper">
            <select class="custom-select" id="menu_id" name="menu_id">
                <option value="">اختر</option>
                <?php foreach($subMenuItems as $item){ ?>
                    <option value="<?php echo $item['id'];?>"><?php echo $item['name'];?></option>
                <?php }?>
            </select>
        </div>        
    </li>
<?php }else{
    echo 'done';
} ?>
