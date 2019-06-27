<?php
$mensagem = $this->session->flashdata('mensagem');
echo (isset($mensagem) ? '<div class="alert alert-success" role="alert">' . $mensagem . '</div>' : '');
?>
<div class="container my-5 pt-4">
    <div class="row ">
        <div class="col-md-12 mb-3">
            <div class="card rounded-0 shadow-lg">
                <div class="card-header bg-nav text-center text-white">
                    <h3 class="mb-0">Lista de Produtos</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive shadow">
                        <div class="text-center text-white">
                            <a href="<?= $this->config->base_url() ?>Admin/Produtos/Cadastrar" class="btn btn-outline-info">Cadastrar</a>
                        </div>
                        <table class="table table-hover text-center mb-0">
                            <thead class="bg-nav text-white">
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Parcelamento Máximo</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Fornecedor</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($produtos) > 0) {

                                    foreach ($produtos as $p) {
                                        echo '<tr>';
                                        echo '<td class="align-middle table-cells" >' . $p->tx_nome . '</td>';
                                        echo '<td class="align-middle table-cells" >' . $p->vl_preco . '</td>';
                                        echo '<td class="align-middle table-cells" >' . $p->tx_descricao . '</td>';
                                        echo '<td class="align-middle table-cells" >' . $p->tx_marca . '</td>';
                                        echo '<td class="align-middle table-cells" >' . $p->num_parcelamentoMaximo . '</td>';
                                        echo '<td class="align-middle table-cells" >' . $p->tx_nomeC . '</td>';
                                        echo '<td class="align-middle table-cells" >' . $p->tx_nomeF . '</td>';
                                        echo '<td class="align-middle table-cells" >';
                                        echo '<a data-toggle="tooltip" title="Adicionar imagens" class="btn btn-outline-secondary mr-3" href="' . $this->config->base_url() . 'Admin/Imagem/Produto/' . $p->id_produto . '"><i class="far fa-images"></i></a>';
                                        echo '<a data-toggle="tooltip" title="Alterar" class="btn btn-outline-primary mr-3" href="' . $this->config->base_url() . 'Admin/Produtos/Alterar/' . $p->id_produto . '"><i class="fas fa-pencil-alt"></i></a>';
                                        echo '<a data-toggle="tooltip" title="Deletar" class="btn btn-outline-danger mr-3" href="' . $this->config->base_url() . 'Admin/Produtos/Deletar/' . $p->id_produto . '"><i class="fas fa-times-circle"></i></a>';
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td class"align-middle" width="100%" colspan="9">Não há produtos registrados</td></tr>';
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