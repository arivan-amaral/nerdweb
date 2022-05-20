<!--Blog Card-->
<div id="card-panel-type" class="section">
    <h4 class="header">Notícias</h4>
    <p class="text-center">
        <a href="#modalNovaNoticia" class="mb-6 btn waves-effect waves-light modal-trigger gradient-45deg-blue-teal">Nova Notícia</a>

        <!-- Modal Estrutura Start -->
    <div id="modalNovaNoticia" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Nova Notícia</h4>
            <form id="formAddNoticia" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="titulo" id="fn">
                        <label for="fn">Título</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="text">URL Notícia</label>
                        <textarea id="message" name="url_noticia" class="materialize-textarea"></textarea>
                         
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6 s12">
                        <input placeholder="01/01/2022" id="date-demo2" type="date" class="" name="data">
                        <label for="date-demo2">Data Postagem</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="message" name="conteudo" class="materialize-textarea"></textarea>
                        <label for="message">Conteúdo Notícia</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button type="button" onclick=" ajax_add_post('AddNoticia');" class="btn cyan waves-effect waves-light right" name="action" id="btnSendAddNoticia">Finalizar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <a class="modal-action modal-close waves-effect waves-green btn-flat ">Fechar</a>
        </div>
    </div>
    </p>
    <div class="row mt-2" id='todas_postagens'>

    </div>
</div>

<!-- <div class="divider mt-8"></div> -->



<div id='ModalEditarPost' class='modal modal-fixed-footer'>
    <div class='modal-content'>
        <h4>Editar Notícia</h4>
        <form id='formEditarPost' method='POST'>
            <div class='row'>
                <div class='input-field col s12'>
                    <input type='text' name='titulo' id='editar_titulo' value=''>
                    <input type='hidden' name='id' id='editar_id' value=''>
                    <label for='fn' class="active">Título</label>
                </div>
            </div>
            <div class='row'>
                <div class='input-field col s12'>

                    <label for='text' class="active">URL Notícia</label>
                    
                    <input type='text' name='url_noticia' id='editar_url_noticia' values=''>

                </div>
            </div>
            <div class='row'>
                <div class='input-field col m6 s12'>
                    <input placeholder='' name='data' id='editar_data' type='date' value=''>
                    <label for='date-demo2' class="active">Data Postagem</label>
                </div>
            </div>
            <div class='row'>
                <div class='input-field col s12'>
                    <textarea id='editar_conteudo' name='conteudo' class='materialize-textarea'></textarea>
                    <label class="active">Conteúdo Notícia</label>
                </div>
                <div class='row'>
                    <div class='input-field col s12'>
                        <button onclick="ajax_editar_post('EditarPost');" class='btn cyan waves-effect waves-light right' type='button' id="btnSendEditarPost" name='action'>Finalizar
                            <i class='material-icons right'>send</i>
                        </button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <div class='modal-footer'>
        <a class='modal-action modal-close waves-effect waves-green btn-flat '>Fechar</a>
    </div>
</div>