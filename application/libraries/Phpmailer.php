<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Phpmailer
{
    public function __construct()
    {
        log_message('debug', 'PHPmailer class is loaded.');
    }

    public function load()
    {
        require_once(APPPATH . 'third_party/phpmailer/src/PHPmailer.php');
        require_once(APPPATH . 'third_party/phpmailer/src/SMTP.php');
        require_once(APPPATH . 'third_party/phpmailer/src/Exception.php');

        $objMail = new PHPmailer\PHPMailer\PHPMailer();
        return $objMail;
    }
}
