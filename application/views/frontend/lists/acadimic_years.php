<?php if(count($academicYears)){ ?>
     <li class="field-group">
        <label class="form-label" for="">سنة :</label>
        <div class="select-options-wrapper">
            <select class="custom-select" id="academic_year" name="academic_year">
                <?php foreach($academicYears as $year){ ?>
                    <option value="<?php echo $year['id'];?>"><?php echo $year['name'];?></option>
                <?php }?>
            </select>
        </div>        
    </li>
<?php } ?>
