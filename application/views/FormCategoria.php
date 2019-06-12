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
                            <tbody id="categoria">
                                <?= (isset($categoria)) ?

                                    '<tr>
                                    <th>
                                    <input placeholder="* Nome" class="form-control form-control-lg rounded-0" type="text" name="nome" value="' . $categoria->tx_nome . '">
                                    </th>
                                    <th>
                                    <textarea placeholder="* Descrição" class="form-control form-control-lg rounded-0" name="descricao" id="descricao" cols="30" rows="1">' . $categoria->tx_descricao . '</textarea>
                                    </th>
                                    <th>
                                    <select class="form-control form-control-lg rounded-0" name="departamento" id="departamento"><option selected hidden disabled>* Selecione um departamento</option>'
                                    : ''
                                    
                                ?>
                                <?php
                                if (isset($categoria)) {
                                    
                                    if (count($departamentos) > 0) {
                                        foreach ($departamentos as $d) {
                                            echo '<option ';
                                            echo (isset($categoria) && $d->id_departamento == $categoria->ref_departamento) ? " selected " : "";
                                            echo ' value="' . $d->id_departamento . '">' . $d->tx_nome . '</option>';
                                        }
                                    } else {
                                        echo '<option value="" disabled>Não há departamentos cadastrados</option>';
                                    }
                                    echo '</select>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="form-group text-center py-2">
                            <?= isset($categoria) ? '' : '<button class="btn btn-outline-info mr-3" type="submit" id="createCat">+</button>'?>
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
<meta name="departamentos" content='<?= json_encode($departamentos); ?>'>