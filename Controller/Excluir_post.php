<?php
require_once  "../Model/Conexao.php";
try {
    $tblname = "noticia";
    unset($_POST['action']);
    $condFields=array();
    $condValues=array();
    foreach ($_POST as $key => $value) {
            $condFields[]=$key;
            $condValues[]=$value;
    }
    $database->deletePrepared($tblname,   $condFields, $condValues);
    echo"excluido";
} catch (Exception $e) {
    echo "erro: $e";
}