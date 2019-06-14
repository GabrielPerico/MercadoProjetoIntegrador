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
                            <input placeholder="Ano-Mês-Dia Hora:Minutos:Segundos" class="form-control form-control-lg rounded-0 input-5" type="datetime-local" name="parcelamentoMaximo" value="<?= (isset($produtos)) ? $produtos->vl_preco : ''; ?>">
                        </div>
                        <div class="form-group py-2">
                            <textarea placeholder="* Descrição" class="form-control form-control-lg rounded-0" name="descricao" id="descricao" cols="30" rows="5"><?= (isset($produtos)) ? $produtos->tx_descricao : ''; ?></textarea>
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