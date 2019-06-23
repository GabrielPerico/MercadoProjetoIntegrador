<?php
$mensagem = $this->session->flashdata('mensagem');
echo (isset($mensagem) ? ' <div class="alert alert-danger" role="alert">' . $mensagem . '</div>' : '');
?>
<link rel="stylesheet" href="<?= $this->config->base_url() ?>css/rome.min.css">
<div class="container my-5 pt-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card rounded-0 shadow-lg">
                <div class="card-header bg-nav text-center text-white">
                    <h3 class="mb-0">Registrar Promoção</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" class="form" enctype="multipart/form-data">

                        <div class="form-group py-2">
                            <input placeholder="* Nome" class="form-control form-control-lg rounded-0" type="text" name="nome" value="<?= (isset($promocao)) ? $promocao->tx_nome : ''; ?>">
                        </div>
                        <div class="form-group py-2">
                            <label for="dtInicio">Data de Inicio</label>
                            <input type="text" class="form-control form-control-lg rounded-0 input1" id="input1" value="">
                            <input type="hidden" name="dtInicio" value="">
                        </div>
                        <div class="form-group py-2">
                            <label for="dtFim">Data de Termino</label>
                            <input type="text" class="form-control form-control-lg rounded-0 input2" id="input2" value="">
                            <input type="hidden" name="dtFim" value="">
                        </div>
                        <hr>
                        <div class="form-group py-2 text-center">
                            <button class="btn btn-outline-success px-3 mr-3" type="submit">Enviar</button>
                        </div>
                        <h6 class="card-subtitle mb-2 font-italic font-weight-lighter text-left py-3">* Campo obrigatório</h6>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <meta name="data" content='<?=(isset($promocao))? json_encode($promocao) : '' ?>'>
    <script src="<?= $this->config->base_url() ?>js/rome.min.js"></script>
    <script src="<?= $this->config->base_url() ?>js/rome.js"></script>
    