<?php
$mensagem = $this->session->flashdata('mensagem');
echo (isset($mensagem) ? '<div class="alert alert-success" role="alert">' . $mensagem . '</div>' : '');
?>
<div class="container my-5 pt-4">
    <div class="row ">
        <div class="col-md-12 mb-3">
            <div class="card rounded-0 shadow-lg">
                <div class="card-header bg-nav text-center text-white">
                    <h3 class="mb-0">Imagens</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive shadow">
                        <div class="text-center text-white">
                            <a href="<?= $this->config->base_url() ?>Imagem/Cadastrar/<?= $id ?>" class="btn btn-outline-info">Cadastrar</a>
                        </div>
                        <table class="table semdatatable table-hover text-center mb-0">
                            <thead class="bg-nav text-white">
                                <tr>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Porcentagem</th>
                                    <th scope="col">Promoção</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($produtos) > 0) {
                                    foreach ($produtos as $p) {
                                        echo '<tr>';
                                        echo '<td class="align-middle table-cells" >' . $p->tx_nome . '</td>';
                                        echo '<td class="align-middle table-cells" >' . $p->num_porcentagem . '</td>';
                                        echo '<td class="align-middle table-cells" >' . $p->tx_nomeP . '</td>';
                                        echo '<td class="align-middle table-cells" >';
                                        echo '<a data-toggle="tooltip" title="Deletar" class="btn btn-outline-danger mr-3" href="' . $this->config->base_url() . 'Promocao/DeletarProduto/' . $p->id_pep . '/' . $p->id_produto . '"><i class="fas fa-times-circle"></i></a>';
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td class"align-middle" width="100%" colspan="9">Não há imagens deste produto registradas</td></tr>';
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