<input type="hidden" name="answer_id" value="<?php echo (isset($answers)) ? trim($answers['QuestionAnswers'][0]['id']) : '';?>" />
<li class="field-group">
    <label class="form-label" for="">نموذج أ (يمين):</label>
    <div style="float: right;">
            <input type="text" autocomplete="off" data-items="6" data-provide="typeahead" name="question" placeholder="" class="input-medium template1" data-original-title=""/>
        </div>
</li>

<li class="field-group" style="clear: none;">        
    
        <label class="form-label" for="">نموذج  ب (يسار) :</label>
        <div style="float: right;">
            <input type="text" autocomplete="off" data-items="6" data-provide="typeahead" name="answer_text" placeholder="" class="input-medium template2" data-original-title=""/>
        </div>            
    
</li>

<?
$template1_tags = '';
if (isset($answers)) {
    $template1 = explode(',', $answers['question']);

    for ($i = 0; $i < count($template1); $i++) {
        $template1_tags .= '"' . $template1[$i] . '", ';
    }
}

$template2_tags = '';
if (isset($answers)) {
    $template2 = explode(',', $answers['QuestionAnswers'][0]['answer_text']);

    for ($i = 0; $i < count($template2); $i++) {
        $template2_tags .= '"' . $template2[$i] . '", ';
    }
}
?>

<script type="text/javascript">               
    jQuery(".template1:eq(0)").tagsManager({
        prefilled: [<?php echo $template1_tags;?>],
        preventSubmitOnEnter: true,
        typeahead: true,
        typeaheadAjaxSource: null,                    
        blinkBGColor_1: '#FFFF9C',
        blinkBGColor_2: '#CDE69C',
        hiddenTagListName: 'question'
    });                
    jQuery(".template2:eq(0)").tagsManager({
        prefilled: [<?php echo $template2_tags;?>],
        preventSubmitOnEnter: true,
        typeahead: true,
        typeaheadAjaxSource: null,                    
        blinkBGColor_1: '#FFFF9C',
        blinkBGColor_2: '#CDE69C',
        hiddenTagListName: 'answer_text'
    });                
</script>