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
                            <input placeholder="* Nome" class="form-control form-control-lg rounded-0" type="text" name="nome" value="<?= (isset($promocao)) ? $promocao->tx_nome : ''; ?>">
                        </div>
                        <div class="form-group py-2">
                            <label for="dtInicio">Data de Inicio</label>
                            <input type="text" class="form-control form-control-lg rounded-0" name="dtInicio" id="input-1" value="<?= (isset($promocao)) ? $promocao->dt_inicioDaPromocao : '' ?>">
                        </div>
                        <div class="form-group py-2">
                            <label for="dtFim">Data de Termino</label>
                            <input type="text" class="form-control form-control-lg rounded-0" name="dtFim" id="input-fim" value="<?= (isset($promocao)) ? $promocao->dt_fimDaPromocao : '' ?>">
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
<div>

    <script>
        $(document).ready(function() {
            new Cleave('#input-1', {
                date: true,
                numeralIntegerScale: 4,
                blocks: [4, 2, 2, 2, 2, 2],
                delimiters: ['-', '-', ' ', ':', ':']
            });
            new Cleave('#input-fim', {
                date: true,
                blocks: [4, 2, 2, 2, 2, 2],
                delimiters: ['-', '-', ' ', ':', ':']
            });
        });
    </script>