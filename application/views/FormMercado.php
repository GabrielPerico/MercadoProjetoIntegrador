<?php
$mensagem = $this->session->flashdata('mensagem');
echo (isset($mensagem) ? ' <div class="alert alert-danger" role="alert">' . $mensagem . '</div>' : '');
?>
<div class="container my-5 pt-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card rounded-0 shadow-lg">
                <div class="card-header bg-nav text-center text-white">
                    <h3 class="mb-0">Alterar Mercado</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" class="form" enctype="multipart/form-data">
                        <div class="form-group py-2">
                            <input placeholder="* Nome" class="form-control form-control-lg rounded-0" type="text" name="nome" id="nome" value="<?= $mercado->tx_nome ?>">
                        </div>
                        <div class="form-group py-2">
                            <table class="table-responsive semdatatable">
                                <tbody>
                                    <tr>
                                        <td class="p-1">
                                            <input placeholder="* Telefone 1" class="form-control form-control-lg rounded-0 input-1" type="text" name="telefone" id="telefone" value="<?= $mercado->tx_telefone ?>">
                                        </td>
                                        <td class="p-1">
                                            <input placeholder="Telefone 2" class="form-control form-control-lg rounded-0 input-2" type="text" name="telefone2" id="telefone2" value="<?= $mercado->tx_telefone2 ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">
                                            <input placeholder="Telefone 3" class="form-control form-control-lg rounded-0 input-3" type="text" name="telefone3" id="telefone3" value="<?= $mercado->tx_telefone3 ?>">
                                        </td>
                                        <td class="p-1">
                                            <input placeholder="Telefone 4" class="form-control form-control-lg rounded-0 input-4" type="text" name="telefone4" id="telefone4" value="<?= $mercado->tx_telefone4 ?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group py-2">
                            <input placeholder="* Email" class="form-control form-control-lg rounded-0" type="text" name="email" id="email" value="<?= $mercado->tx_email ?>">
                        </div>
                        <div class="form-group py-2">
                            <input placeholder="* Endereço" class="form-control form-control-lg rounded-0" type="text" name="endereco" id="endereco" value="<?= $mercado->tx_endereco ?>">
                        </div>
                        <div class="form-group py-2">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="userfile" class="custom-file-input" id="logo" aria-describedby="inputGroupFileAddon01" value="<?= (isset($mercado)) ? $this->config->base_url(). 'uploads/logo/' . $mercado->img_logo : '' ?>">
                                    <label class="custom-file-label" for="logo">Selecione um Arquivo</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group py-2 text-center">
                            <button class="btn btn-outline-success px-3 mr-3" type="submit">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= $this->config->base_url() ?>js/cleave.js"></script>