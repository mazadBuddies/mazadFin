<?php
    require_once('class/makeReport.class.php');
    if($_SERVER['REQUEST_METHOD'] === "GET"){
        $report = new pdfReport();
        if(isset($_GET['fullReport'])){
            $report->fullReport();
        }
        elseif(isset($_GET['user'])){
            $report->user($_GET['user']);
        }
    }
?>