<?php
require_once  "../Model/Conexao.php";
try {
    $tblname = "noticia";
    $dataFields = array();
    $dataValues = array();
    unset($_POST['action']);
    $condFields=array();
    $condValues=array();
    $url_noticia='';
    foreach ($_POST as $key => $value) {
       
        if($key=='titulo'){
            $url_noticia=str_replace(' ','-',$value);
            $dataFields[] = $key;
            $dataValues[] = $value;
        }

        if($key=='id'){
            $condFields[]=$key;
            $condValues[]=$value;

        }else {
            $dataFields[] = $key;
            $dataValues[] = $value;
        }
    }
 
    $database->updatePrepared($tblname,  $dataFields, $dataValues,  $condFields,  $condValues);
    
    
    echo"editada";
} catch (Exception $e) {
    echo "erro: $e";
}