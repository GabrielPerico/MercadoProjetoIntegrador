<?php
$mensagem = $this->session->flashdata('mensagem');
echo (isset($mensagem) ? '<div class="alert alert-success" role="alert">' . $mensagem . '</div>' : '');
?>
<div class="container my-5 pt-4">
    <div class="row ">
        <div class="col-md-12 mb-3">
            <div class="card rounded-0 shadow-lg">
                <div class="card-header bg-nav text-center text-white">
                    <h3 class="mb-0">Categorias</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive shadow">
                        <div class="text-center text-white">
                            <a href="<?= $this->config->base_url() ?>Categoria/Cadastrar" class="btn btn-outline-info">Cadastrar</a>
                        </div>
                        <hr>
                        <table class="table table-hover text-center mb-0">
                            <thead class="bg-nav text-white">
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Departamento</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($categorias) > 0) {

                                    foreach ($categorias as $c) {
                                        echo '<tr>';
                                        echo '<td class="align-middle table-cells" >' . $c->tx_nome . '</td>';
                                        echo '<td class="align-middle table-cells" >' . $c->tx_descricao . '</td>';
                                        echo '<td class="align-middle table-cells" >' . $c->tx_nomeD . '</td>';
                                        echo '<td class="align-middle table-cells" >';
                                        echo '<a data-toggle="tooltip" title="Alterar" class="btn btn-outline-primary mr-3" href="' . $this->config->base_url() . 'Categoria/Alterar/' . $c->id_categoria . '"><i class="fas fa-pencil-alt"></i></a>';
                                        echo '<a data-toggle="tooltip" title="Deletar" class="btn btn-outline-danger mr-3" href="' . $this->config->base_url() . 'Categoria/Deletar/' . $c->id_categoria . '"><i class="fas fa-times-circle"></i></a>';
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td class"align-middle" width="100%" colspan="4">Não há categorias registradas</td></tr>';
                                }
                                ?>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>