<?php
class notification{
    private $connect;
    private $tableName = 'notification';
    public function __construct(){
        $this->connect = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
        $this->connect->setTable($this->tableName);
    }

    public function getNotificationByUserId($id){
        $userNotifications = $this->select("*", array('toId'), array($id));
    }

}//end of class notification