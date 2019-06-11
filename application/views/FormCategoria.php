<?php
$mensagem = $this->session->flashdata('mensagem');
echo (isset($mensagem) ? ' <div class="alert alert-danger" role="alert">' . $mensagem . '</div>' : '');
?>
<div class="container my-5 pt-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card rounded-0 shadow-lg">
                <div class="card-header bg-nav text-center text-white">
                    <h3 class="mb-0">Registrar Categorias</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" class="form" enctype="multipart/form-data">
                        <table class="table semdatatable">
                            <thead>
                                <tr>
                                    <th colspan="2">
                                        <input class="form-control form-control-lg rounded-0" type="number" id="rows">
                                    </th>
                                    <th class="text-center">
                                        <button class="btn btn-outline-success" type="submit" id="createCat">Gerar</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="categoria">
                            </tbody>
                        </table>
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
    <script>
        $("#createCat").click(function(e) {
            e.preventDefault();
            var InnerHTML = '';
            var quant = $('#rows').val();
            for (var i = 1; i <= quant; i++) {
                InnerHTML += '<tr><th>';
                InnerHTML += '<input placeholder="* Nome" class="form-control form-control-lg rounded-0" type="text" name="nome[]" value="<?= (isset($categorias)) ? $categorias->tx_nome : ''; ?>">';
                InnerHTML += '</th><th>';
                InnerHTML += '<textarea placeholder="* Descrição" class="form-control form-control-lg rounded-0" name="descricao[]" id="descricao" cols="30" rows="1"><?= (isset($categorias)) ? $categorias->tx_descricao : ''; ?></textarea>';
                InnerHTML += '</th><th>';
                InnerHTML += '<select class="form-control form-control-lg rounded-0" name="departamento[]" id="departamento"><option <?= (isset($categorias)) ? '' : 'selected' ?> hidden disabled>* Selecione um departamento</option><?php if (count($departamentos) > 0) {
                                                                                                                                                                                                                                        foreach ($departamentos as $d) {
                                                                                                                                                                                                                                            echo '<option ';
                                                                                                                                                                                                                                            echo (isset($categorias) && $d->id_departamento == $categorias->ref_departamento) ? 'selected' : '';
                                                                                                                                                                                                                                            echo ' value="' . $d->id_departamento . '">' . $d->tx_nome . '</option>';
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                        echo '<option value="" disabled>Não há departamentos cadastrados</option>';
                                                                                                                                                                                                                                    } ?></select>';
                InnerHTML += '</th></tr>';
            }

            $("#categoria").html(InnerHTML);
        });
    </script>