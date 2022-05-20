<?php
require_once "../Controller/Template.php";
use Nerdweb\Template;
$template = new Template();
    $template->insert("head");
    $template->insert("header");
    $template->insert("menu");
?>

<div id="main">
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div class="section">
                    <!-- Start Card News -->
                    <?php
                        $template->insert("card");
                        $template->insert("conteudo");
                    ?>
                    <!-- End Card News -->
                </div>
                <!-- END RIGHT SIDEBAR NAV -->
                <div style="bottom: 50px; right: 19px;" class="fixed-action-btn direction-top"><a class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow"><i class="material-icons">add</i></a>
                    <ul>
                        <!-- <li><a href="css-helpers.html" class="btn-floating blue"><i class="material-icons">help_outline</i></a></li> -->
                        <!-- <li>Adicionar<a href="#modal2" class="btn-floating blue"><i class="material-icons">add</i>Adicionar</a></li> -->
                        <!-- <li><a href="app-calendar.html" class="btn-floating amber"><i class="material-icons">today</i></a></li> -->
                        <!-- <li><a href="app-email.html" class="btn-floating red"><i class="material-icons">mail_outline</i></a></li> -->
                    </ul>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
</div>
<script>
    setTimeout(() => {
        listar_posts();

    }, 100);
</script>

<?php
    $template->insert("footer");
?>