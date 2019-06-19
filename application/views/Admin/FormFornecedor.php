<?php
$mensagem = $this->session->flashdata('mensagem');
echo (isset($mensagem) ? ' <div class="alert alert-danger" role="alert">' . $mensagem . '</div>' : '');
?>
<div class="container my-5 pt-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card rounded-0 shadow-lg">
                <div class="card-header bg-nav text-center text-white">
                    <h3 class="mb-0">Registrar Fornecedor</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" class="form" enctype="multipart/form-data">

                        <div class="form-group py-2">
                            <input placeholder="* Nome" class="form-control form-control-lg rounded-0" type="text" name="nome" value="<?= (isset($fornecedor) ? $fornecedor->tx_nome : ''); ?>">
                        </div>
                        <div class="form-group py-2">
                            <input placeholder="* Endereço" class="form-control form-control-lg rounded-0" type="text" name="endereco" value="<?= (isset($fornecedor) ? $fornecedor->tx_endereco : ''); ?>">
                        </div>
                        <div class="form-group py-2">
                            <input placeholder="* Telefone" class="form-control form-control-lg rounded-0 input-1" type="text" name="telefone" value="<?= (isset($fornecedor) ? $fornecedor->tx_telefone : ''); ?>">
                        </div>
                        <div class="form-group py-2">
                            <input placeholder="* Email" class="form-control form-control-lg rounded-0" type="email" name="email" value="<?= (isset($fornecedor) ? $fornecedor->tx_email : ''); ?>">
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
    <script src="<?= $this->config->base_url() ?>js/cleave.js"></script>