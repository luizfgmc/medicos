<?php
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.gmail.com'; //change this
    $config['smtp_port'] = '465';
    $config['smtp_user'] = 'noreply.medicoamigo@gmail.com'; //change this
    $config['smtp_pass'] = 'sendmail123'; //change this
    $config['mailtype'] = 'html';
    $config['charset'] = 'iso-8859-1';
    $config['wordwrap'] = TRUE;
    $config['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard
?>