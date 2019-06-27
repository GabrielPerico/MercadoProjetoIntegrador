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
                                <tr id="row0">
                                    <th class="align-middle">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" onchange="readURL(this,0);" name="files[]" id="customFile0">
                                            <label class="custom-file-label" for="customFile0">Escolha um arquivo</label>
                                        </div>
                                    </th>
                                    <th>
                                        <img src="http://denrakaev.com/wp-content/uploads/2015/03/no-image.png" alt="Sua imagem" class="preview" id="preview0">
                                    </th>
                                    <th class="align-middle">
                                        <a id="0" class="btn btn-outline-danger deleteRow" href="#"><i class="far fa-times-circle"></i></a>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group py-2 text-center">
                            <button class="btn btn-outline-info mr-3" name="fileSubmit" id="createImg" type="submit">+</button>
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