<?php
$mensagem = $this->session->flashdata('mensagem');
echo (isset($mensagem) ? ' <div class="alert alert-danger" role="alert">' . $mensagem . '</div>' : '');
?>
<div class="container my-5 pt-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card rounded-0 shadow-lg">
                <div class="card-header bg-nav text-center text-white">
                    <h3 class="mb-0">Adicionar Imagens</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" class="form" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <table class="table semdatatable">
                            <thead>
                                <tr>
                                    <th colspan="2">
                                        <input class="form-control form-control-lg rounded-0" type="number" id="rows">
                                    </th>
                                    <th>
                                        <button class="btn btn-outline-success" type="submit" id="createImg">Gerar</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="form-group py-2">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="userfile" class="custom-file-input" id="logo" aria-describedby="inputGroupFileAddon01" value="<?= (isset($mercado)) ? $this->config->base_url() . 'uploads/logo/' . $mercado->img_logo : '' ?>">
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
</div>