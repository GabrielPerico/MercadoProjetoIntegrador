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
                            <tbody id="imagens">
                            </tbody>
                        </table>
                </div>
                <div class="form-group py-2 text-center">
                    <button class="btn btn-outline-info px-3 mr-3" id="createImg">+</button>
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