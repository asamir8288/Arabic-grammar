<li class="field-group">
    <label class="form-label" for="">السؤال :</label>
    <textarea type="text" name="question" id="question" ><?php echo (isset($answers)) ? trim($answers['question']) : ''; ?></textarea>
</li>
<li class="field-group">        
    <label class="form-label" for="">الاجابة :</label>
    <div style="float: right;">
        <input type="text" autocomplete="off" data-items="6" data-provide="typeahead" name="answer_text" placeholder="" class="input-medium tagManager" data-original-title=""/>
    </div>    
</li>

<?
$answers_tags = '';
if (isset($answers)) {
    $answer = explode(',', $answers['QuestionAnswers'][0]['answer_text']);

    for ($i = 0; $i < count($answer); $i++) {
        $answers_tags .= '"' . $answer[$i] . '", ';
    }
}
?>

<script type="text/javascript">               
    jQuery(".tagManager:eq(0)").tagsManager({
        prefilled: [<?php echo $answers_tags; ?>],
        preventSubmitOnEnter: true,
        typeahead: true,
        typeaheadAjaxSource: null,                    
        blinkBGColor_1: '#FFFF9C',
        blinkBGColor_2: '#CDE69C',
        hiddenTagListName: 'answer_text'
    });                
</script>