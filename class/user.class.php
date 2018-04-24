<?php

class user{
    private $firstName;
    private $lastName;
    private $gender;
    private $userRole;
    private $email;
    private $password;
    private $userName;
    private $imgPath;
    private $following;
    private $followers;
    private $birthDate;
    private $biddings;
    private $createdSessions;
    private $arrayOfData;
    
    public function __construct($email ="", $password =""){
        $this->email = $email;
        $this->password = $password;
//        echo "GOOOOOOOOOOOOOOOD";
        //$this->logIn();
    }


    public function lsData(){
        echo $this->firstName. $this->lastName;
    }
    public function logIn(){
        $connect = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
        $connect->setTable('user');
        $this->email = $_POST['email'];
        $this->password = sha1($_POST['password']);
        $allData = $connect->select("*", array('email', 'userPassword'),array($this->email, $this->password));
        if(sizeof($allData) > 0){
            $_SESSION['id']             = $allData[0]['id'];
            $_SESSION['firstName']      = $allData[0]['firstName'];
            $_SESSION['lastName']       = $allData[0]['lastName'];
            $_SESSION['userName']       = $allData[0]['userName'];
            $_SESSION['imagePath']      = $allData[0]['imagePath'];
            $_SESSION['email']          = $allData[0]['email'];
            $_SESSION['gender']         = $allData[0]['gender'];
            $_SESSION['userRole']       = $allData[0]['userRole'];
            $_SESSION['following']      = $allData[0]['following'];
            $_SESSION['followers']      = $allData[0]['followers'];
            $_SESSION['biddings']       = $allData[0]['biddings'];
            $_SESSION['createdSessions']= $allData[0]['createdSessions'];
            $_SESSION['birthDate']      = $allData[0]['birthDate'];
            $_SESSION['user']           = new user($this->email, $this->password);
            $_SESSION['user']->setData();
            header("location:index.php");
            } 
            else{
                //echo HOST . " " . DB_NAME . " " . DB_USER . " " . DB_PASS;
                
                print_r($connect->select());
            }//end of else
        }//end of if

        public function setData(){
            $this->firstName = $_SESSION['firstName'];
            $this->lastName  = $_SESSION['lastName'];
            $this->email     = $_SESSION['email'];
            $this->imgPath   = $_SESSION['imagePath'];
            $this->password  = $_SESSION['password'];
            $this->userName  = $_SESSION['userName'];
            $this->gender    = $_SESSION['gender'];
            $this->userRole  = $_SESSION['userRole'];
            $this->following = $_SESSION['following'];
            $this->followers = $_SESSION['followers'];
            $this->birthDate = $_SESSION['birthDate'];
            $this->createdSessions = $_SESSION['createdSessions'];
        }

        public function getFullName(){
            $con = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
            $con->setTable('user');
            $data = $con->select("firstName , lastName ", array('id'), array($_SESSION['id']));
            if((int)sizeof($data) > 0){
                return $data[0]['firstName'] . " " . $data[0]['lastName'];
            }

        }
        public function logOut(){
            
            session_unset(); 
            session_destroy(); 
            header("location:login.php");
        }

        public function getRole(){
            return $_SESSION['userRole'];
        }

    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }
    public function getUserInfoById( $id ){
        $connect = new dataBase (HOST , DB_NAME , DB_USER , DB_PASS);
        $connect->setTable('user');
        $data = $connect->select('*' , array('id') , array($id));
         return $data ;
   }
   
    /**
     * Get the value of imgPath
     */
    public function getImgPath(){
        echo ($_SESSION['imagePath'] == '')?"imgs/12.jpg":$_SESSION['imagePath'];
        
    }//end of getImage

    public function getGenderAsString($number){
        return ($number == 1)?"Male":"Female";
    }

     public function getPowerSession( $id ){
        $connect = new dataBase (HOST , DB_NAME , DB_USER , DB_PASS);
        $connect->setTable('session');
        $sessionWin= $connect->select('*' , array('currentUser' , 'finished') , array($id , 1));
        $connect->setTable('sessionenters');
        $enterSession = $connect->select('*' , array('userId') , array($id));
         return (sizeof($sessionWin)/sizeof($enterSession))*100;

    }

    public function getFollwing($id){
         $connect = new dataBase (HOST , DB_NAME , DB_USER , DB_PASS);
         $connect->setTable('follow');
         $follow=$connect->select('*' , array('fromId') , array($id));
         $connect->setTable('user');
         $follwingUserInfo = array();
         for ($i=0; $i < sizeof($follow) ; $i++) { 
            $UserInfo=$connect->select('firstName, imagePath, id', array('id'), array($follow[$i]['toId']));
            $arrayInfo= array("firstName"=> $UserInfo[0]['firstName'] , "id"=> $UserInfo[0]['id'], "imagePath"=> $UserInfo[0]['imagePath']);
            $followingUserInfo[] = $arrayInfo;
         }
         return $followingUserInfo ;

    }

     public function getFollower($id){
         $connect = new dataBase (HOST , DB_NAME , DB_USER , DB_PASS);
         $connect->setTable('follow');
         $follow=$connect->select('*' , array('toId') , array($id));
         $connect->setTable('user');
         $follwingUserInfo = array();
         for ($i=0; $i < sizeof($follow) ; $i++) { 
            $UserInfo=$connect->select('firstName, imagePath, id', array('id'), array($follow[$i]['fromId']));
            $arrayInfo= array("firstName"=> $UserInfo[0]['firstName'] , "id"=> $UserInfo[0]['id'], "imagePath"=> $UserInfo[0]['imagePath']);
            $followingUserInfo[] = $arrayInfo;
         }
         return $followingUserInfo ;

    }

    public function getAge($id){
        $connect = new dataBase(HOST , DB_NAME , DB_USER , DB_PASS);
        $connect->setTable('user');
        $Age = $connect->select('*' , array('birthDate') , array($id));
        
    }

    public function getRate($id){
        $connect = new dataBase(HOST , DB_NAME , DB_USER , DB_PASS);
        $connect->setTable('user');
        $ratte = $connect->select('*' , array('rate') , array($id));
        
    }

    public function generateRank($Rank){
       if($Rank <= 200){
        return "Class J";
       }
       elseif ($Rank > 200 && $Rank <= 399) {
           return "Class I";
       }
       elseif ($Rank >=400 && $Rank <= 599) {
           return "Class H";
       }
       elseif ($Rank >=600  && $Rank <= 799) {
           return "Class G";
       }
       elseif ($Rank >=800 && $Rank <= 999) {
           return "Class F";
       }
       elseif ($Rank >= 1000 && $Rank <= 1199) {
           return "Class E";
       }
       elseif ($Rank >=1200 && $Rank <= 1399) {
           return "Class D";
       }
       elseif ($Rank >= 1400 && $Rank <= 1599) {
           return "Class C";
       }
       elseif ($Rank >= 1600 && $Rank <= 1799) {
           return "Class B";
       }
       elseif ($Rank > 1800 && $Rank <= 1999) {
           return "Class A";
       }
       elseif ($Rank >=2000 && $Rank <= 2199) {
           return "Expert";
       }
       elseif ($Rank > 2200) {
           return "Class National Master";
       }
       elseif ($Rank >2400) {
           return "Class Senior Master";
       }
    }

    public function getLastVisit($id){
        $connect = new dataBase(HOST , DB_NAME , DB_USER , DB_PASS);
        $connect->setTable('user');
        $ratte = $connect->select('*' , array('lastVisit') , array($id));
    }
    public function getRegistered($id){
        $connect = new dataBase(HOST , DB_NAME , DB_USER , DB_PASS);
        $connect->setTable('user');
        $ratte = $connect->select('*' , array('RegisterDate') , array($id));
    }
   
    }//end of class



    if ($_SERVER['REQUEST_METHOD']== 'POST'){
        if ($_POST['ACTION'] == 'Edit'){
            $connect = new dataBase(HOST , DB_NAME , DB_USER , DB_PASS);
             $connect->setTable("user");
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email= $_POST['email'];
            $userName = $_POST['userName'];
             $connect->update(array('firstName', 'lastName' , 'email' , 'userName'), array($firstName , $lastName , $email , $userName) ,array('id') , array($_POST['id']));
        }
    }