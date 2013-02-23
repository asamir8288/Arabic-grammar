<?php

function send_email($email, $subject, $title, $body, $attached = '', $from = 'ahmed@dominosmedia.com') {

    $CI = & get_instance();
    $CI->load->library('email');

    $mail_config = array(
        'mailtype' => 'html'
    );
    $CI->email->initialize($mail_config);

    $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.gmail.com',
        'smtp_port' => 465,
        'smtp_user' => 'ahmed.samir@basharsoft.com',
        'smtp_pass' => '123456',
        'mailtype' => 'html',
    );

    $CI->email->from($from, 'Master Chief');
    $CI->email->to($email);
    $CI->email->reply_to($from, 'Master Chief');
    if ($attached != '') {
        $CI->email->attach($attached);
    }

    $CI->email->subject($subject);

    $html_email = '<html><head></head><body style="width:600px;background-color: #FFFFFF;font-family: Calibri;">
    <div>        
</div>
    <div style="margin-top: 20px;margin-bottom: 20px;margin-left: 20px;">
        <div>
            <h2 style="color: #0E76BC; font-size: 18px; font-weight: bolder;">' . $title . '</h2>
            <p>
                ' . $body . '
            </p>
        </div>
        <p style="font-size: 13px; font-style: italic;">Thanks &amp; Best Regards, <br />
        Master Chief</p>
    </div>
    <div style="width: 600px; height: 30px;">
        <span style="font-size: 11px;color: #404040;padding-left: 200px;padding-top: 2px;
              display: inline-block; margin-top: 5px;">All rights reserved &copy; Master Chief' . date('Y') . '</span>
    </div>
</body></html>';

    $CI->email->message($html_email);
    $CI->email->send();
}

?>