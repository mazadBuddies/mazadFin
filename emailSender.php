<?php
require_once('class/emailSender.class.php');
if($_SERVER['REQUEST_METHOD'] === "GET"){
        if(isset($_GET['email']) && isset($_GET['message'])){
            $mail = new email($_GET['email'], $_GET['subject']?$_GET['subject']:'', $_GET['message']);
            $mail->send();
            
    }
}
?>