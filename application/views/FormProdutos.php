<?php
$mensagem = $this->session->flashdata('mensagem');
echo (isset($mensagem) ? ' <div class="alert alert-danger" role="alert">' . $mensagem . '</div>' : '');
?>
<div class="container my-5 pt-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card rounded-0 shadow-lg">
                <div class="card-header bg-nav text-center text-white">
                    <h3 class="mb-0">Registrar Produtos</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" class="form" enctype="multipart/form-data">

                        <div class="form-group py-2">
                            <input placeholder="* Nome" class="form-control form-control-lg rounded-0" type="text" name="nome" value="<?= (isset($produtos)) ? $produtos->tx_nome : ''; ?>">
                        </div>
                        <div class="form-group py-2">
                            <input placeholder="* Preço" class="form-control form-control-lg rounded-0" type="text" name="preco" value="<?= (isset($produtos)) ? $produtos->vl_preco : ''; ?>">
                        </div>
                        <div class="form-group py-2">
                            <input placeholder="* Marca" class="form-control form-control-lg rounded-0" type="text" name="marca" value="<?= (isset($produtos)) ? $produtos->tx_marca : ''; ?>">
                        </div>
                        <div class="form-group py-2">
                            <input placeholder="* Parcelamento Máximo" class="form-control form-control-lg rounded-0" type="number" name="parcelamentoMaximo" value="<?= (isset($produtos)) ? $produtos->vl_preco : ''; ?>">
                        </div>
                        <div class="form-group py-2">
                            <textarea placeholder="* Descrição" class="form-control form-control-lg rounded-0" name="descricao" id="descricao" cols="30" rows="5"><?= (isset($produtos)) ? $produtos->tx_descricao : ''; ?></textarea>
                        </div>
                        <div class="form-group py-2">
                            <select class="form-control form-control-lg rounded-0" name="categoria" id="categoria">
                                <option <?= (isset($produtos)) ? '' : 'selected' ?> hidden disabled>* Selecione uma categoria</option>
                                <?php
                                if (count($categorias) > 0) {
                                    foreach ($categorias as $c) {
                                        echo '<option ';
                                        echo (isset($produtos) && $c->id_categoria == $produtos->ref_categoria) ? 'selected' : '';
                                        echo ' value="' . $c->id_categoria . '">' . $c->tx_nome . '</option>';
                                    }
                                } else {
                                    echo '<option value="" disabled>Não há categorias cadastradas</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group py-2">
                            <select class="form-control form-control-lg rounded-0" name="fornecedor" id="fornecedor">
                                <option <?= (isset($produtos)) ? '' : 'selected' ?> hidden disabled>* Selecione um fornecedor</option>
                                <?php
                                if (count($fornecedores) > 0) {
                                    foreach ($fornecedores as $f) {
                                        echo '<option ';
                                        echo (isset($produtos) && $f->id_fornecedor == $produtos->ref_fornecedor) ? 'selected' : '';
                                        echo ' value="' . $f->id_fornecedor . '">' . $f->tx_nome . '</option>';
                                    }
                                } else {
                                    echo '<option value="" disabled>Não há fornecedores cadastradas</option>';
                                }
                                ?>
                            </select>
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