<?php
require_once "mail/Mail.php";
class email{
    private $host;
    private $port;
    private $username;
    private $password;
    private $from;
    private $smtp;
    private $email;
    private $subject;
    private $message;

    public function __construct($email, $subject, $message){

        $this->host = 'smtp.gmail.com';
        $this->port = '587';
        $this->username = "mazadsw@gmail.com";
        $this->password = "A123456789!";
        $this->from ="mazadsw@gmail.com";
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;

        $this->headers = array ('From' => $this->from,
        'To' => $this->email,
        'Subject' => $this->subject);

        $this->smtp = Mail::factory('smtp',
        array ('host' => $this->host,
                'port' => $this->port,
                'auth' => true,
                'username' => $this->username,
                'password' => $this->password));
    }

    public function send(){
        $mail = $this->smtp->send($this->email, $this->headers, $this->message);
        if (PEAR::isError($mail)) {
        echo("<p>" . $mail->getMessage() . "</p>");
        } else {    
        echo("<p>Message was successfully sent!</p>");
        }
    }
}
?>