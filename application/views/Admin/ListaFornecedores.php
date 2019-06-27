<?php
$mensagem = $this->session->flashdata('mensagem');
echo (isset($mensagem) ? '<div class="alert alert-success" role="alert">' . $mensagem . '</div>' : '');
?>
<div class="container my-5 pt-4">
    <div class="row ">
        <div class="col-md-12 mb-3">
            <div class="card rounded-0 shadow-lg">
                <div class="card-header bg-nav text-center text-white">
                    <h3 class="mb-0">Fornecedores</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive shadow">
                        <div class="text-center text-white">
                            <a href="<?= $this->config->base_url() ?>Admin/Fornecedores/Cadastrar" class="btn btn-outline-info">Cadastrar</a>
                        </div>
                        <hr>
                        <table class="table table-hover text-center mb-0">
                            <thead class="bg-nav text-white">
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Endereço</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($fornecedores) > 0) {

                                    foreach ($fornecedores as $f) {
                                        echo '<tr>';
                                        echo '<td class="align-middle table-cells" >' . $f->tx_nome . '</td>';
                                        echo '<td class="align-middle table-cells" >' . $f->tx_endereco . '</td>';
                                        echo '<td class="align-middle table-cells" >' . $f->tx_telefone . '</td>';
                                        echo '<td class="align-middle table-cells" >' . $f->tx_email . '</td>';
                                        echo '<td class="align-middle table-cells" >';
                                        echo '<a data-toggle="tooltip" title="Alterar" class="btn btn-outline-primary mr-3" href="' . $this->config->base_url() . 'Admin/Fornecedores/Alterar/' . $f->id_fornecedor . '"><i class="fas fa-pencil-alt"></i></a>';
                                        if ($f->num_produtos > 0) {
                                            echo '<span class="d-inline-block mr-3" tabindex="0" data-toggle="tooltip" title="Há produtos cadastrados com esse fornecedor!"><a class="disabled btn btn-outline-danger" href=""><i class="fas fa-times-circle"></i></a></span>';
                                        } else {
                                            echo '<a data-toggle="tooltip" title="Deletar" class="btn btn-outline-danger mr-3" href="' . $this->config->base_url() . 'Admin/Fornecedores/Deletar/' . $f->id_fornecedor . '"><i class="fas fa-times-circle"></i></a>';
                                        }
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td class"align-middle" width="100%" colspan="5">Não há fornecedores registrados</td></tr>';
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