<?php echo form_open($submit_url); ?>
<div class="timerWrapper">	
    <div class="border-3 shadow-4 timer active">				
        <div class="timer_meter" style="overflow: hidden; width: 100%; ">
            <div class="timer_value" style="color:#ffffff; whitespace: nowrap;"><span class='count'></span></div>
        </div>
    </div>
</div>


<div class="resultWrapper" >	
    <?php echo form_submit('submit', 'السؤال التالى', 'style="padding: 6px 17px;font-weight: bold;color: blue;font-size: 14px;position: relative;top: 4px;"');?>
</div>

<div class="dropdown-questions-wrapper question-block">

    <p class="dropdown-question-main-paragraph">
        <input type="hidden" name="qId" value="<?php echo $q['id']; ?>" />
        <input type="hidden" name="ua_id" value="<?php echo $q['Assessments']['UserAssessments'][0]['id']; ?>" />
        <?php
        $Matches = explode(' ', $q['question']);
        foreach ($Matches as $match) {
            if (preg_match("/\(([^\)]*)\)/", $match)) {
                $text = $match;

                $start = strpos($match, "(");
                $end = strpos($match, ")");

                $choices = explode('/', substr($text, $start + 1, $end - $start - 1));
                ?>
                <span class="dropdown-select-wrapper">
                    <span class="empty-line-item">------</span>
                    <input type="hidden" name="answers[]" value="" id="user_answers" />
                    <select class="dropdown-item">
                        <option value="empty-dropdown-answer"> -- </option>
                        <?php
                        foreach ($choices as $choice) {                            
                           echo '<option value="dropdown-answer">'. $choice .'</option>'; 
                        }
                        ?>
                    </select>
                </span>
                <?php
            } else {
                echo $match . ' ';
            }
        }
        ?>
    </p>	
</div>
<?php echo form_submit('submit', ' ', 'class="next"');?>
<?php echo form_close(); ?>