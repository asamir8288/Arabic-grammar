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

<script type="text/javascript">               
    jQuery(".template1:eq(0)").tagsManager({
        prefilled: [""],
        preventSubmitOnEnter: true,
        typeahead: true,
        typeaheadAjaxSource: null,                    
        blinkBGColor_1: '#FFFF9C',
        blinkBGColor_2: '#CDE69C',
        hiddenTagListName: 'question'
    });                
    jQuery(".template2:eq(0)").tagsManager({
        prefilled: [""],
        preventSubmitOnEnter: true,
        typeahead: true,
        typeaheadAjaxSource: null,                    
        blinkBGColor_1: '#FFFF9C',
        blinkBGColor_2: '#CDE69C',
        hiddenTagListName: 'answer_text'
    });                
</script>