<a class="inside-btn-place submit-btn" href="<?php echo site_url('admin/assessment/create_question/' . $assessment_id)?>">انشاء سؤال جديد</a>
<div style="clear: both;height: 20px;"></div>
<input name="search" class="labels-table-search" type="text" id="search" placeholder="بحث عن اسئلة ..." style="display:none;" /><div id="loader" style="display:none;"><img src="<?php echo static_url(); ?>layout/images/loader.gif" alt="Laoder" /></div>

<div class="clear"></div>
<table width="100%" id="table1" class="advancedtable" border="0" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th>السؤال</th>
            <th>نمط السؤال</th>
            <th>درجة الصعوبة</th>
            <th>هل السؤال مفعل؟</th>
            <th>تاريخ الانشاء</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($questions as $question) { ?>
            <tr>
                <td><a title="<?php echo $question['question'];?>" href="<?php echo base_url();?>"><?php echo (strlen($question['question'])>100) ? substr($question['question'], 0, 100) : $question['question']; ?></a></td>
                <td><?php echo $question['QuestionTypes']['name']; ?></td>
                <td><?php echo $question['DifficultyLevels']['name']; ?></td>
                <td>
                    <?php
                    if ($question['is_active']) {
                        ?>
                        <a class="visibility active-img" href="<?php echo $question['id']; ?>"></a>
                        <?php
                    } else {
                        ?>
                        <a class="visibility inactive-img" href="<?php echo $question['id']; ?>"></a>
                        <?php
                    }
                    ?>
                </td>
                <td><?php echo date('d-m-Y', strtotime($question['created_at'])); ?></td>
                <td><?php echo anchor(site_url('admin/assessment/delete/' . $question['id']), 'حذف'); ?></td>                
            </tr>
        <?php } ?>
    </tbody>
</table>

<script type="text/javascript" language="javascript">
   
    $(document).ready(function() {

        $('.list_filter').liveFilter({hideDefault: false});
		 
        $("#search").show();
        $("#table1").advancedtable({searchField: "#search", loadElement: "#loader", searchCaseSensitive: false, ascImage: "images/up.png", descImage: "images/down.png"});

    });
</script>