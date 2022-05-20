<?php
require_once  "../Model/Conexao.php";
try {
     $db = new PDO("sqlite:../Model/nerdweb.db") or die("Erro ao abrir a base");
    $tblname = "noticia";
    $dataFields = array();
    $dataValues = array();
    unset($_POST['action']);
    
    foreach ($_POST as $key => $value) {
        
        if ($value != '') {
            $dataFields[] = $key;
            $dataValues[] = $value;
        }
        
    }
  
    $database->insertPrepared($tblname,  $dataFields,  $dataValues);
    echo"adicionada";
} catch (Exception $e) {
    echo "erro: $e";
}
