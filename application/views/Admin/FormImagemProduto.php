<?php
$mensagem = $this->session->flashdata('mensagem');
echo (isset($mensagem) ? ' <div class="alert alert-danger" role="alert">' . $mensagem . '</div>' : '');
?>
<div class="container my-5 pt-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card rounded-0 shadow-lg">
                <div class="card-header bg-nav text-center text-white">
                    <h3 class="mb-0">Registrar Imagens</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" class="form" enctype="multipart/form-data">
                        <table class="table semdatatable">
                            <tbody id="imagens">
                                
                            </tbody>
                        </table>
                        <div class="form-group py-2 text-center">
                        <?= (isset($departamento)) ? '' : '<button class="btn btn-outline-info mr-3" name="fileSubmit" id="createImg" type="submit">+</button>'?>
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