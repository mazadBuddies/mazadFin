<?php
/*
 ************** this file include user methods   *****************
 *           this V.2.1.1 of mazad website at 12 MAR 2018        *
 *          this file contains main user functions               *
 *****************************************************************
*/
class user{
    private $firstName;
    private $lastName;
    private $gender;
    private $userRole;
    private $email;
    private $password;
    private $userName;
    private $imgPath;
    private $arrayOfData;
    private $imagePathRoot = ROOT_APP . 'imgs/';
    public function logIn($email, $password){
        $connect = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
        $connect->setTable('user');
        $password = sha1($password);
        $allData = $connect->select("*", array('email', 'userPassword'),array($email, $password));
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

    }//end of function

    public function signUp(){
        $validationErorrs = array();
        $connect = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
        $connect->setTable('user');
        $time		= date('Y-m-d H:i:s'); // this var. for regDate
        $masterValid = new validation();

        if(!$masterValid->isAlpha($_POST['firstName'])){
            $validationErorrs["firstName"] = "First Name Should be letters only";
        }

        if(!$masterValid->isAlpha($_POST['lastName'])){
            $validationErorrs["lastName"] = "Last Name Should be letter only";
        }

        if(!$masterValid->isEmail($_POST['email'])){
            $validationErorrs["email"] = "Email not Valid";
        }

        if(sizeof($connect->select("userName", array("userName"), array($_POST['userName']))) > 0){
            $validationErorrs["userName"] = "User Name is already exist";
        }

        if(sizeof($connect->select("id", array("email"), array($_POST['email']))) > 0){
            $validationErorrs["emailEx"] = "Email is already exist";
        }

        if(sizeof($connect->select("id", array("creditCard"), array($_POST['creditCard']))) > 0){
            $validationErorrs["credit"] = "Credit Card is already exist";
        }

        if($_POST['password'] != $_POST['comPassword']){
            $validationErorrs["passwordEQ"] = "Your Confirmation password not equal password";
        }

        echo "<pre>";
        print_r($validationErorrs);
        echo "</pre>";
        /*$insertColArrayName = array(
                            'firstName',
                            'lastName', 
                            'gender', 
                            'userName', 
                            'email', 
                            'birthDate',
                            'imagePath', 
                            'RegisterDate',
                            'userPassword'
                        );

        $valuesColArray     = array(
                $_POST['firstName'], 
                $_POST['lastName'], 
                $this->getGenderValue($_POST['gender']),
                $_POST['userName'],
                $_POST['email'],
                "1998-03-07",
                $_FILES['images']["name"],
                $time,
                sha1($_POST['password'])
            );
        $this->uploadImage();
        $connect->insert($insertColArrayName, $valuesColArray);
        */
    }//end of function signUp

    public function uploadImage(){
        $uploadeImage = new fileUploader($this->imagePathRoot, "images");
        $uploadeImage->upload();
    }

    public function getGenderValue($gender){return ($gender == 'male')?1:2;}

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
        }// end of if
    }// end of function

    public function logOut(){
        session_unset(); 
        session_destroy(); 
        header("location:login.php");
    }

    public function getRole(){return $_SESSION['userRole'];}
    public function getFirstName(){return $this->firstName;}
    public function getLastName(){return $this->lastName;}
    public function setLastName($lastName){$this->lastName = $lastName;}
    public function getGender(){return $this->gender;}
    public function setGender($gender){$this->gender = $gender;return $this;}

    public function getUserInfoById( $id ){
        $connect = new dataBase (HOST , DB_NAME , DB_USER , DB_PASS);
        $connect->setTable('user');
        $data = $connect->select('*' , array('id') , array($id));
        return $data ;
    }

    public function getImgPath(){
        echo ($_SESSION['imagePath'] == '')?"imgs/12.jpg":$_SESSION['imagePath'];
    }//end of getImage

    public function getGenderAsString($number){
        return ($number == 1)?"Male":"Female";
    }

    public function getPowerSession( $id ){
        $connect = new dataBase (HOST , DB_NAME , DB_USER , DB_PASS);
        $connect->setTable('session');
        $sessionWin= sizeof($connect->select('*' , array('currentUser' , 'finished') , array($id , 1)));
        $connect->setTable('sessionEnters');
        $enterSession = sizeof($connect->select('*' , array('userId') , array($id)));
        return ($sessionWin > 0 && $enterSession > 0)?($sessionWin/$enterSession)*100:0;
    }//end of fucntion getPowerSession

    public function getFollwing($id){
        $connect = new dataBase (HOST , DB_NAME , DB_USER , DB_PASS);
        $connect->setTable('follow');
        $follow = $connect->select('*' , array('fromId') , array($id));
        $connect->setTable('user');
        $follwingUserInfo = array();
        if(sizeof($follow) > 0){
            for ($i=0; $i < sizeof($follow) ; $i++) { 
                $UserInfo = $connect->select('firstName, imagePath, id', array('id'), array($follow[$i]['toId']));
                $arrayInfo = array("firstName"=> $UserInfo[0]['firstName'] , "id"=> $UserInfo[0]['id'], "imagePath"=> $UserInfo[0]['imagePath']);
                $follwingUserInfo[] = $arrayInfo;
            }
        }
        return $follwingUserInfo ;
    }

    public function getFollower($id){
        $connect = new dataBase (HOST , DB_NAME , DB_USER , DB_PASS);
        $connect->setTable('follow');
        $follow = $connect->select('*' , array('toId') , array($id));
        $connect->setTable('user');
        $follwingUserInfo = array();
        if(sizeof($follow) > 0){
            for ($i=0; $i < sizeof($follow) ; $i++) { 
                $UserInfo=$connect->select('firstName, imagePath, id', array('id'), array($follow[$i]['fromId']));
                $arrayInfo= array("firstName"=> $UserInfo[0]['firstName'] , "id"=> $UserInfo[0]['id'], "imagePath"=> $UserInfo[0]['imagePath']);
                $follwingUserInfo[] = $arrayInfo;
            }
        }
        return $follwingUserInfo ;
    }//end of function
}//end of class

if ($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['ACTION'])){
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