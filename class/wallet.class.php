<?php
    if(!isset($_SESSION['id'])){session_start();}
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "../config/directors.config.php";
        include CLASS_DIR . 'autoLoader.class.php';
    }

    class wallet{
        private $tableName = 'wallet';
        private $connect;
        public function __construct(){
            $this->connect = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
        }
        public function getWalletByUserId($id){
            $this->connect->setTable($this->tableName);
            return $this->connect->select('*', array('ownerId'), array($id));
        }
        public function creatWallet($walletName, $balance, $userId){
            $myWallets = $this->getWalletByUserId($userId);
            if(sizeof($myWallets)==0){
                $this->connect->insert(
                array('walletName', 'realBalance', 'ownerId'), 
                array($walletName, $balance, $userId));
                return $balance;
            }//end of if
            else{
                $this->connect->update(
                    array('walletName', 'realBalance'), 
                    array($walletName, $balance + $myWallets[0]['realBalance']),
                    array('ownerId'),
                    array($userId)
                );
                return $balance + $myWallets[0]['realBalance'];
            }
            
        }//end of function createWallet
    }//end of class wallet


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST['ACTION'] == 'INSERT_WALLET'){
            //print_r($_POST);
            $wallet = new wallet();
            echo $wallet->creatWallet($_POST['name'], $_POST['balance'], $_SESSION['id']);
        }
    }