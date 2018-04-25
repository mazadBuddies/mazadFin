<?php
    include "../config/directors.config.php";
    include "autoLoader.class.php";
    $db = new dataBase(HOST ,DB_NAME,DB_USER, DB_PASS);
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if($_POST['ACTION'] == 'ACTIVATE'){
            $db->setTable("user"); 
            $db->update(array("blocked"), array(0), array("id"),array($_POST['id']));
        }
        elseif($_POST['ACTION'] == 'DEACTIVATE'){
            $db->setTable("user"); 
            $db->update(array("blocked"), array(1), array("id"),array($_POST['id']));
        }
        elseif($_POST['ACTION'] == 'DELETE_CATEGORY'){
            $db->setTable("categorie"); 
            $db->delete(array('id'), array($_POST['id']));
        }
        elseif($_POST['ACTION'] == 'DELETE_SESSION'){
            $db->setTable("session"); 
            $db->delete(array('id'), array($_POST['id']));
        }
        elseif($_POST['ACTION'] == 'ADD_CATEGORY'){
            $db->setTable("categorie"); 
            $db->insert("(icon, categorieName, details)", "(".$_POST['categorieIcon'].','.$_POST['categorieName'].','.$_POST['categorieDetails'].")");
        }
        elseif($_POST['ACTION'] == 'CLEAR_REPORT'){
            $db->setTable("report"); 
            $db->delete(array('id'), array($_POST['id']));
        }
        echo($_POST['id']);
    }
?>