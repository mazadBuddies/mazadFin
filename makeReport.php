<?php
    include "config/directors.config.php";
    include "class/autoLoader.class.php";
    require('fpdf.php');

    #report content
    $content = ['user', 'session', 'categorie', 'product', 'report'];

    #pdf object
    $pdf = new FPDF();
    $pdf->AddPage();

    #database object
    $db = new dataBase(HOST ,DB_NAME,DB_USER, DB_PASS);
    
    if($_SERVER['REQUEST_METHOD'] === "GET"){
        if(isset($_GET['fullReport'])){
            for($i=0;$i<count($content);$i++){
                #set table
                $db->setTable($content[$i]);
                $c = $db->select();

                #title
                $pdf->SetFont('courier','B',16);
                $pdf->Cell(40,10,strtoupper($content[$i]), 0, 1);

                #counter
                $pdf->SetFont('courier','B',12);
                $pdf->Cell(50,10,$content[$i]." counter:", 0);
                $pdf->Cell(40,10,count($c), 0, 1);
            }
        }
        elseif(isset($_GET['user'])){
            #get user
            $db->setTable('user');
            $c = $db->select('*', array('id'), array($_GET['user']), true)[0];
            $id = $c['id'];
            
            #title
            $pdf->SetFont('courier','B',16);
            $pdf->Cell(40,10,strtoupper($c['firstName']. ' '.$c['lastName']), 0, 1); #full name

            #details
            $pdf->SetFont('courier','B',12);
            $pdf->Cell(20,10,$c['gender'] == 1?'male':'female', 0); #gender
            $pdf->Cell(20,10,$c['email'], 0, 1);  #email
            $pdf->Cell(20,10,$c['birthDate'], 0, 1); #birthdate
            $pdf->Cell(20,10,$c['userRole']==1?'ADMIN':'USER', 0, 1);  #role
            $pdf->Cell(20,10,'rate: '.$c['rate'], 0, 1);  #rate
            $pdf->Image($c['imagePath'], 150, 10, 50, 50); #picture

            #print sessions
            $db->setTable('session');
            $c = $db->select('*', array('sessionOwnerId'), array($id), true);
            $pdf->SetFont('courier','B',16);
            $pdf->Cell(20,10,'Sessions', 0, 1);
            $pdf->SetFont('courier','B',12);
            if(count($c)==0) $pdf->Cell(20,10,'No Sessions', 0, 1);
            else{
                for($i=0;$i<count($c);$i++){
                    $pdf->Cell(20,10,$c[$i]['sessionName'], 0, 1);
                }
            }

            #print made reports
            $db->setTable('report');
            $c = $db->select('*', array('fromId'), array($id), true);
            $pdf->SetFont('courier','B',16);
            $pdf->Cell(20,10,'User Reports', 0, 1);
            $pdf->SetFont('courier','B',12);
            if(count($c)==0) $pdf->Cell(20,10,'No Reports', 0, 1);
            else{
                for($i=0;$i<count($c);$i++){
                    $pdf->Cell(20,10,$c[$i]['report'], 0, 1);
                }
            }

            #print others' reports
            $db->setTable('report');
            $c = $db->select('*', array('aboutId'), array($id), true);
            $pdf->SetFont('courier','B',16);
            $pdf->Cell(20,10,'Reported', 0, 1);
            $pdf->SetFont('courier','B',12);
            if(count($c)==0) $pdf->Cell(20,10,'No Reports', 0, 1);
            else{
                for($i=0;$i<count($c);$i++){
                    $pdf->Cell(20,10,$c[$i]['report'], 0, 1);
                }
            }
        }
        $pdf->Output();
    }
?>