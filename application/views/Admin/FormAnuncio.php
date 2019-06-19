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
                        <div class="form-group py-2">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="userfile" class="custom-file-input" id="logo" aria-describedby="inputGroupFileAddon01" value="<?= (isset($equipe)) ? $this->config->base_url() . 'uploads/' . $equipe->imagem : '' ?>">
                                    <label class="custom-file-label" for="logo">Selecione um Arquivo</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group py-2 text-center mr-3">
                            <button class="btn-success btn" id="mostrar" type="submit">Mostrar</button>
                            <input type="hidden" name="mostrar" value="1">
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