<div style="margin-top: 30px;">
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
            break;
    }
    ?>
</div>