<?php
    require_once  "../Model/Conexao.php";
    try {
        $nome_campos = array('id');
        $valor_campos = array($_POST['id']);
        $resltado = $database->selectPrepared("noticia",  $nome_campos,  $valor_campos, "", "",  "");
        $result = '';
        foreach ($resltado as $key => $value) {
            $id = $value['id'];
            $titulo = $value['titulo'];
            $data = $value['data'];
            $url_noticia = $value['url_noticia'];
            $conteudo = $value['conteudo'];
            echo json_encode([
                'id' => $id,
                'titulo' => $titulo,
                'data' => $data,
                'url_noticia' => $url_noticia,
                'conteudo' => $conteudo
            ]);
        }
    } catch (Exception $e) {
        echo "Erro ao listar posts";
    }
?>