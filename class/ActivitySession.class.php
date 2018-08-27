<?php

class ActivitySession{
    public function getTypeOfSession($userid)
    {
        $connectToDatabase = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
        $connectToDatabase->setTable('session');
        $myOWneSession = $connectToDatabase->select('*' ,array('sessionOwnerId'), array($_SESSION['id']));
        $myWinSession = $connectToDatabase->select('*' ,array('currentUser', 'finished'), array($_SESSION['id']) , 1);
        $myAllSessions = array();
        if(sizeof($myOWneSession)>0){
            for($i=sizeof($myOWneSession)-1; $i>= 0 ; $i--){
                $connectToDatabase->setTable('product');
                $productName = $connectToDatabase->select('productName', array('id'), array($myOWneSession[$i]['productId']));
                $arrayAsRow = array(
                    "type"     => 0 ,
                    "date"     => $myOWneSession[$i]['startTime'],
                    "desc"     => "buy ". $productName[0]['productName'],
                    "finalPrice"=> $myOWneSession[$i]['currentOffer'],
                    "status"    =>  $myOWneSession[$i]['description']
                );
                $myAllSessions[] = $arrayAsRow;
            }
        }
        if(sizeof($myWinSession)>0)
        {
            for($i=sizeof($myWinSession)-1; $i>= 0 ; $i--){
                $connectToDatabase->setTable('product');
                $productName = $connectToDatabase->select('productName', array('id'), array($myWinSession[$i]['productId']));
                $arrayAsRow = array(
                    "type"     => 1 ,
                    "date"     => $myWinSession[$i]['startTime'],
                    "desc"     => "sell ". $productName[0]['productName'],
                    "finalPrice"=> $myWinSession[$i]['currentOffer'],
                    "status"    =>  $myWinSession[$i]['description']
                );
                $myAllSessions[] = $arrayAsRow;
            }
        }
        return $myAllSessions;
    }
}//end of class ActivitySession