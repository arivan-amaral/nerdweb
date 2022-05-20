<?php
    require_once  "../Model/Conexao.php";
    try {
        sleep(1);

        $nome_campos = array();
        $valor_campos = array();
        $resltado = $database->selectPrepared("noticia",  $nome_campos,  $valor_campos, "", "",  "");
        $result='';
        foreach ($resltado as $key => $value) {
            $id = $value['id'];
            $result.= "
        
        <div class='col s12 m6 l4 card-width' id='post$id'>
            <div class='card-panel border-radius-6 mt-10 card-animation-1'>
                <img class='responsive-img border-radius-8 z-depth-4 image-n-margin' src='app-assets/images/cards/noticia.png' alt='images' />
                <h6><a href='#" . $value['url_noticia'] . "' class='mt-5'>" . $value['titulo'] . "</a></h6>
                <p>" . $value['conteudo'] . "</p>
                <div class='row mt-6'>
                    <div class='col s0'>
                    </div>
                    <a href='#" . $value['url_noticia'] . "'>
                        <div class='col s3 p-0 mt-1'><span class='pt-2'>" . $value['data'] . "</span></div>
                    </a>
                    <div class='col s7 mt-1 right-align'>
                        <a href='" . $value['url_noticia'] . "'><i class='material-icons'>share</i></a>
                    </div>
                </div>
                <div class='mt-5'>
                    <form name='form$id' id='form$id'>
                        <input type='hidden' name='id' value='$id'>
                        <a onclick='ajax_buscar_post_edit($id);' href='#ModalEditarPost' class='mb-6 btn waves-effect waves-light modal-trigger amber darken-4'>Editar</a>
                        <a onclick='alert_excluir_post($id);' class='mb-6 btn waves-effect waves-light red accent-2'>Deletar</a>
                    </form>
                </div>
            </div>
        </div>";
        }
        echo $result;
    } catch (Exception $e) {
        echo "Erro ao listar posts";
    }
?>