<?php
$mensagem = $this->session->flashdata('mensagem');
echo (isset($mensagem) ? ' <div class="alert alert-success" role="alert">' . $mensagem . '</div>' : '');
?>
<div class="container">
    <div class="row mt-5">
        <div class=" col-md-4 col-sm-2">
            <img class="shadow-lg img-fluid border border-black rounded-circle" src="<?= $this->config->base_url()?>uploads/logo/<?= $mercado->img_logo ?>">
        </div>
        <div class="col-8 text-center mt-5">
            <div class="row">

                <div class="text-center col-md-12">
                    <h1><?= $mercado->tx_nome ?></h1>
                    <br>
                    <h6><b>Telefone: </b><?= $mercado->tx_telefone ?></h6>
                    <h6><b>Email: </b><?= $mercado->tx_email ?></h6>
                </div>
            </div>
                <hr class="col-md-5 text-center">
            <div class="row">
                <div class="col-md-12 mt-2 text-center">    
                    <a role="button" class="btn btn-outline-secondary" href="<?= $this->config->base_url() ?>Mercado/Alterar">Alterar</a>
                </div>
            </div>
        </div>
    </div>
</div>