<?php
$mensagem = $this->session->flashdata('mensagem');
echo (isset($mensagem) ? '<div class="alert alert-success" role="alert">' . $mensagem . '</div>' : '');
?>
<div class="container my-5 pt-4">
    <div class="row ">
        <div class="col-md-12 mb-3">
            <div class="card rounded-0 shadow-lg">
                <div class="card-header bg-nav text-center text-white">
                    <h3 class="mb-0">Lista de anuncios</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive shadow">
                        <div class="text-center text-white">
                            <a href="<?= $this->config->base_url() ?>Admin/Anuncio/Cadastrar" class="btn btn-outline-info">Cadastrar</a>
                        </div>
                        <table class="table table-hover text-center mb-0">
                            <thead class="bg-nav text-white">
                                <tr>
                                    <th scope="col">Status</th>
                                    <th scope="col">Imagem</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($anuncios) > 0) {
                                    

                                    foreach ($anuncios as $a) {
                                        echo '<tr>';
                                        echo '<td class="align-middle table-cells">';
                                        echo ($a->sl_mostrar == 0)? '<p class="h3 text-danger">▬</p>' : '<p class="h3 text-success">▬</p>';
                                        echo '</td>';
                                        echo '<td class="align-middle table-cells" ><img class="img-fluid img-produto" src="'.$this->config->base_url() . 'uploads/anuncios/' . $a->img_imagem . '"></td>';
                                        echo '<td class="align-middle table-cells" >';
                                        echo ($a->sl_mostrar == 0)? '<a data-toggle="tooltip" title="Mostrar" class="btn btn-outline-success px-3 mr-3" href="' . $this->config->base_url() . 'Admin/Anuncio/Mostrar/' . $a->id_anuncios . '/1"><i class="fas fa-lock"></i></i></a>' : '<a data-toggle="tooltip" title="Ocultar" class="btn btn-success mr-3" href="' . $this->config->base_url() . 'Admin/Anuncio/Mostrar/' . $a->id_anuncios . '/0"><i class="fas fa-lock-open"></i></a>';
                                        echo '<a data-toggle="tooltip" title="Deletar" class="btn btn-outline-danger mr-3" href="' . $this->config->base_url() . 'Admin/Anuncio/Deletar/' . $a->id_anuncios . '"><i class="fas fa-times-circle"></i></a>';
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td class"align-middle" width="100%" colspan="3">Não há anuncios registrados</td></tr>';
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