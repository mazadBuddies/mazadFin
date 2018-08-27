<?php
    ini_set('display_errors', 1);//this for show errs
    error_reporting(~0);// the same target
class ActivityWallet{
    public function getDescription($array){
        return ($array["type"]==1)?"You added " .$array['amount']:"You paid " .$array['amount'];
    } 

    public function getAllActivityWallet(){
        $connectToDatabase = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
        $connectToDatabase->setTable('activity');
        $rowArray = array();
        $myActivities = $connectToDatabase->select("*", array('userId'), array($_SESSION['id']));
        $rowArray = array();
        for($i=0; $i<sizeof($myActivities);$i++)
        {
            $Asrow = array(
                "type"=>$myActivities[$i]["type"],
                "date"=>$myActivities[$i]["activityDate"],
                "status"=>$myActivities[$i]["statusKind"],
                "amount"=>$myActivities[$i]["amount"],
                "description"=>$this->getDescription($myActivities[$i])
            );
            $rowArray[] = $Asrow;
        }
        return $rowArray ;
    } //  end of function
}//end of class ActivityWallet