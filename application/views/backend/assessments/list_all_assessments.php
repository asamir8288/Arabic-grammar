<a class="inside-btn-place submit-btn" href="<?php echo site_url('admin/assessment/create')?>">انشاء اختبار جديد</a>
<div style="clear: both;height: 20px;"></div>
<input name="search" class="labels-table-search" type="text" id="search" placeholder="بحث عن امتحانات ..." style="display:none;" /><div id="loader" style="display:none;"><img src="<?php echo static_url(); ?>layout/images/loader.gif" alt="Laoder" /></div>

<div class="clear"></div>
<table width="100%" id="table1" class="advancedtable" border="0" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th>اسم الامتحان</th>
            <th>زمن الامتحات</th>
            <th>هل تم تفعيله؟</th>
            <th>تاريخ الانشاء</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($assessments as $assessment) { ?>
            <tr>
                <td><a href="<?php echo site_url('admin/assessment/manage_questions/'. $assessment['id']);?>"><?php echo $assessment['name']; ?></a></td>
                <td><?php echo $assessment['assessment_time']; ?></td>
                <td>
                    <?php
                    if ($assessment['published']) {
                        ?>
                        <a class="visibility active-img" href="<?php echo $assessment['id']; ?>"></a>
                        <?php
                    } else {
                        ?>
                        <a class="visibility inactive-img" href="<?php echo $assessment['id']; ?>"></a>
                        <?php
                    }
                    ?>
                </td>
                <td><?php echo $assessment['created_at']; ?></td>
                <td><?php echo anchor(site_url('admin/assessment/delete/' . $assessment['id']), 'حذف'); ?></td>                
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