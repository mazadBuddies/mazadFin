<?php
    include "config/directors.config.php";
    include "class/autoLoader.class.php";
    require('fpdf.php');

    class pdfReport{

        private $content;
        private $pdf;
        private $db;


        public function __construct(){
            
            #report content
            $this->content = ['user', 'session', 'categorie', 'product', 'report'];

            #pdf object
            $this->pdf = new FPDF();
            $this->pdf->AddPage();

            #database object
            $this->db = new dataBase(HOST ,DB_NAME,DB_USER, DB_PASS);
        }
        
        public function fullReport(){
            for($i=0;$i<count($this->content);$i++){
                #set table
                $this->db->setTable($this->content[$i]);
                $c = $this->db->select();

                #title
                $this->pdf->SetFont('courier','B',16);
                $this->pdf->Cell(40,10,strtoupper($this->content[$i]), 0, 1);

                #counter
                $this->pdf->SetFont('courier','B',12);
                $this->pdf->Cell(50,10,$this->content[$i]." counter:", 0);
                $this->pdf->Cell(40,10,count($c), 0, 1);
            }
            $this->pdf->Output();
        }

        public function user($id){
            #get user
            $this->db->setTable('user');
            $c = $this->db->select('*', array('id'), array($id), true)[0];
            $id = $c['id'];
            
            #title
            $this->pdf->SetFont('courier','B',16);
            $this->pdf->Cell(40,10,strtoupper($c['firstName']. ' '.$c['lastName']), 0, 1); #full name

            #details
            $this->pdf->SetFont('courier','B',12);
            $this->pdf->Cell(20,10,$c['gender'] == 1?'male':'female', 0); #gender
            $this->pdf->Cell(20,10,$c['email'], 0, 1);  #email
            $this->pdf->Cell(20,10,$c['birthDate'], 0, 1); #birthdate
            $this->pdf->Cell(20,10,$c['userRole']==1?'ADMIN':'USER', 0, 1);  #role
            $this->pdf->Cell(20,10,'rate: '.$c['rate'], 0, 1);  #rate
            $this->pdf->Image($c['imagePath'], 150, 10, 50, 50); #picture

            #print sessions
            $this->db->setTable('session');
            $c = $this->db->select('*', array('sessionOwnerId'), array($id), true);
            $this->pdf->SetFont('courier','B',16);
            $this->pdf->Cell(20,10,'Sessions', 0, 1);
            $this->pdf->SetFont('courier','B',12);
            if(count($c)==0) $this->pdf->Cell(20,10,'No Sessions', 0, 1);
            else{
                for($i=0;$i<count($c);$i++){
                    $this->pdf->Cell(20,10,$c[$i]['sessionName'], 0, 1);
                }
            }

            #print made reports
            $this->db->setTable('report');
            $c = $this->db->select('*', array('fromId'), array($id), true);
            $this->pdf->SetFont('courier','B',16);
            $this->pdf->Cell(20,10,'User Reports', 0, 1);
            $this->pdf->SetFont('courier','B',12);
            if(count($c)==0) $this->pdf->Cell(20,10,'No Reports', 0, 1);
            else{
                for($i=0;$i<count($c);$i++){
                    $this->pdf->Cell(20,10,$c[$i]['report'], 0, 1);
                }
            }

            #print others' reports
            $this->db->setTable('report');
            $c = $this->db->select('*', array('aboutId'), array($id), true);
            $this->pdf->SetFont('courier','B',16);
            $this->pdf->Cell(20,10,'Reported', 0, 1);
            $this->pdf->SetFont('courier','B',12);
            if(count($c)==0) $this->pdf->Cell(20,10,'No Reports', 0, 1);
            else{
                for($i=0;$i<count($c);$i++){
                    $this->pdf->Cell(20,10,$c[$i]['report'], 0, 1);
                }
            }
        $this->pdf->Output();
        }
    }
        
?>