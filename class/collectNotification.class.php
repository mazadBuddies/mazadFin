<?php
class collectNotification{
    public function getAllNotification($id){
        $masterNotification = new notification();
        $allNotification = $masterNotification->getNotificationByUserId($id);
        $allNotificationsAsVeiw = array();
        if(sizeof($allNotification) > 0){
            $masterUser = new user();
            for($i = 0; $i<sizeof($allNotification);$i++){
                $masterRow = array(
                    //$allNotification[$i]['']=>
                );
                
            }
        }
        
        
        $masterUser->getUserInfoById($id);
    }
}