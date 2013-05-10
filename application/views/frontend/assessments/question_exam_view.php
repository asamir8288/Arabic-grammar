<script type="text/javascript">	
    var count = 0;
    var barCount = 0;
    var countDownTime = 0;
		
		
    //Change Time Here
    var difficulty ="2";
		
    if(difficulty =="<?php echo $assessmentQuestions['difficulty_level'];?>")
        countDownTime = 30;
    else if(difficulty =="<?php echo $assessmentQuestions['difficulty_level'];?>")
        countDownTime = 50;
    else
        countDownTime = 70;
		
		
    var stopTimer = false;
			
    $('.count').html(countDownTime + " seconds");		

    var timer1 = $.timer(
    function() {
        if(count < countDownTime)
        {
            count++;
            if ( (countDownTime - count) == 1)
                $('.count').html(" ثانية");		
            else if ( (countDownTime - count) == 2) 
                $('.count').html(" ثنيتين");		
            else
                $('.count').html(countDownTime - count + " ثوانى");			
        }
        else{
			
            //Time Out Action
            $('.question-block').prepend('<div class="new_times_up"></div>');
            timer1.pause();
            timer2.pause();
            stopTimer = true;
				
            $(".resultWrapper").show();											
            $(".timerWrapper").hide();
			
				
					
				
				
        }
    },
    1000,
    true
);	
		
    var timer2 = $.timer(
    function() {
        if(stopTimer == false){
            barCount=barCount+0.1;				
            var dynamicWidth = 100*(countDownTime - barCount)/(countDownTime);				
            $('.timer_meter').css("width",dynamicWidth+"%");
            $('.timer_meter').css("margin-right",100-dynamicWidth+"%");
        }
    },
    100,
    true
);	
		
    $(document).ready(function(){		
        $(".resultWrapper").hide();		
		
        // Answer Clicked [Stop Timer]
        $('ol li').click(function(){ 
            timer1.pause();
            timer2.pause();
            stopTimer = true;
            $(".resultWrapper").show();		
			
        });		
    });		
		
		
</script>

<div style="margin-top: 50px;">
    <?php
    switch ($assessmentQuestions['type_id']) {
        case '1':
            $data['q'] = $assessmentQuestions;
            $this->load->view('frontend/assessments/question_types/exam_multi_choices', $data);
            break;
        case '2':
            $data['q'] = $assessmentQuestions;
            $this->load->view('frontend/assessments/question_types/exam_press_on_correct_answer', $data);
            break;
        case '3':
            $data['q'] = $assessmentQuestions;
            $this->load->view('frontend/assessments/question_types/exam_drag_and_drop', $data);
            break;
        case '4':
            $data['q'] = $assessmentQuestions;
            $this->load->view('frontend/assessments/question_types/exam_dropdowns', $data);
            break;
    }
    ?>
</div>