<?php if (count($subMenuItems)) { ?>
<div class="assessment-section-separator"></div>
    <div class="assessment-item-separator">
        <?php
        foreach ($subMenuItems as $item) {            
            $class = '';
            if (strlen($item['name']) > 60) {
                $class = ' btn-with-long-text';
            }
            
            $style= '';
            if($item['question_count'] > 0){
                $style = 'id="valid-assessment"';
            }
            ?>
        <a menu_id="<?php echo $item['id']; ?>" class="assessment-btn" <?php echo $style;?>><span class="<?php echo $class?>"><?php echo $item['name']; ?></span></a>
    <?php } ?>
    </div>
    <div class="clear"></div>
    <?php
} else {
    echo 'done';
}
?>
