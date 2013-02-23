<?php if (count($subMenuItems)) { ?>
    <div class="assessment-item-separator">
        <?php
        foreach ($subMenuItems as $item) {            
            $class = '';
            if (strlen($item['name']) > 50) {
                $class = ' btn-with-long-text';
            }
            ?>
            <a menu_id="<?php echo $item['id']; ?>" class="assessment-btn<?php echo $class?>"><?php echo $item['name']; ?></a>
    <?php } ?>
    </div>
    <div class="clear"></div>
    <?php
} else {
    echo 'done';
}
?>
