<?php


namespace MVC\lib\traits;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

trait Mailing
{
    public function getBody($txt)
    {
        $email = parse_ini_file(INI.'email.ini');
        return str_replace('{{message}}',$txt,$email['email']);
    }
    public function mail($to,$body,$subject,$debug=0)
    {
        $username = '';
        $password = '';
        extract(parse_ini_file(INI.'mail.ini'), EXTR_OVERWRITE);
        try
        {
            $mail = new PHPMailer(true);

//            if($debug !==0)
//            {
//                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
//            }
            $mail->isSMTP();
            $mail->Host = 'qeema.co';
            $mail->Port       = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth   = true;

            $username = $this->dec($username);
            $mail->Username = $username;
            $mail->Password = $this->dec($password);
            $mail->SetFrom($username, EMAIL_NAME);
            $mail->addAddress($to);

            $mail->IsHTML(true);

            $mail->Subject = $subject;
            $mail->Body    = $this->getBody($body);

            if($mail->send()) {
                return true;
            }

        }catch(Exception $ex)
        {
            if ($debug!==0)
            {
                return $ex;
            }

            return false;
        }
        return false;
    }
}
