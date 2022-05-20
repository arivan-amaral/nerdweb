function CriaRequest() {
    try {
        request = new XMLHttpRequest();
    } catch (IEAtual) {
        try {
            request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (IEAntigo) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (falha) {
                request = false;
            }
        }
    }
    if (!request)
        alert("Seu Navegador não suporta Ajax!");
    else
        return request;
}

function alert_excluir_post(id) {
    swal({
        title: "Deseja realmente excluir essa notícia?",
        text: " ",
        icon: 'warning',
        dangerMode: true,
        buttons: {
            cancel: 'Não',
            delete: 'Sim'
        }
    }).then(function(willDelete) {
        if (willDelete) {
            ajax_excluir_post(id);
        } else {
            swal("Sua notícia não foi excluída!", {
                title: 'Cancelado',
                icon: "error",
            });
        }
    });
}

function ajax_excluir_post(id) {
    var formData = new FormData(document.getElementById("form" + id));

    $.ajax({
        type: 'POST',
        url: '../Controller/Excluir_post.php',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {

            // $('#btnSend').attr("disabled", "disabled");
            // $('#form').css("opacity", ".5");
        },
        success: function(msg) {
            if (msg == 'excluido') {
                swal("Notícia excluída com sucesso!", {
                    icon: "success",
                    button: false,
                    timer: 1500,
                });
            } else {
                swal("Falha ao excluir!", {
                    icon: "error",
                    button: false,
                    timer: 1500,
                });
            }
            var idelemento = "post" + id;
            remover_elemento_html(idelemento);
        }
    });
}

function ajax_buscar_post_edit(id) {
    var formData = new FormData(document.getElementById("form" + id));
    $.ajax({
        type: 'POST',
        url: '../Controller/Buscar_post_edit.php',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            // $('#btnSend').attr("disabled", "disabled");
            // $('#form').css("opacity", ".5");
        },
        success: function(json) {
            const obj = JSON.parse(json);
            document.getElementById("editar_id").value = obj.id;
            document.getElementById("editar_titulo").value = obj.titulo;
            document.getElementById("editar_data").value = obj.data;
            document.getElementById("editar_url_noticia").value = obj.url_noticia;
            document.getElementById("editar_conteudo").value = obj.conteudo;
        }
    });
}

function ajax_add_post(nome_form) {
    var formData = new FormData(document.getElementById("form" + nome_form));
    $.ajax({
        type: 'POST',
        url: '../Controller/Add-noticia.php',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {

            $('#btnSend' + nome_form).attr("disabled", "disabled");
            $('#form' + nome_form).css("opacity", ".5");
        },
        success: function(msg) {
            if (msg == 'adicionada') {
                swal("Notícia adicionada com sucesso!", {
                    icon: "success",
                    button: false,
                    timer: 1500,
                });
                $('#form' + nome_form)[0].reset();
                listar_posts();

            } else {
                swal("Falha ao adicionar!", {
                    icon: "error",
                    button: false,
                    timer: 1500,
                });
            }
        }
    });
    $('#form' + nome_form).css("opacity", "");
    $("#btnSend" + nome_form).removeAttr("disabled");
}

function ajax_editar_post(nome_form) {
    var formData = new FormData(document.getElementById("form" + nome_form));
    $.ajax({
        type: 'POST',
        url: '../Controller/Alter-noticia.php',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#btnSend' + nome_form).attr("disabled", "disabled");
            $('#form' + nome_form).css("opacity", ".5");
        },
        success: function(msg) {
            if (msg == 'editada') {
                swal("Notícia editada com sucesso!", {
                    icon: "success",
                    button: false,
                    timer: 1500,
                });
                $('#form' + nome_form)[0].reset();
                listar_posts();
            } else {
                swal("Falha ao editar!", {
                    icon: "error",
                    button: false,
                    timer: 1500,
                });
            }
        }
    });
    $('#form' + nome_form).css("opacity", "");
    $("#btnSend" + nome_form).removeAttr("disabled");
    $('#ModalEditarPost').modal('close');
}

function remover_elemento_html(idelemento) {
    var node = document.getElementById(idelemento);
    if (node.parentNode) {
        node.parentNode.removeChild(node);
    }
}

function listar_posts() {
    var result = document.getElementById('todas_postagens');
    var xmlreq = CriaRequest();
    xmlreq.open("GET", "../Controller/Conteudo.php", true);
    result.innerHTML = ' <div class="progress"> <div class="indeterminate"></div> </div>';
    xmlreq.onreadystatechange = function() {
        if (xmlreq.readyState == 4) {
            if (xmlreq.status == 200) {
                result.innerHTML = xmlreq.responseText;
            }
        }
    };
    xmlreq.send(null);
}