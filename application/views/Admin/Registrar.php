<?php
$mensagem = $this->session->flashdata('mensagem');
echo (isset($mensagem) ? ' <div class="alert alert-danger" role="alert">' . $mensagem . '</div>' : '');
?>
<link rel="stylesheet" href="<?= $this->config->base_url() ?>css/rome.min.css">
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
                            <input placeholder="* Nome" class="form-control form-control-lg rounded-0" type="text" name="nome" value="">
                        </div>
                        <div class="form-group py-2">
                            <input placeholder="* Email" class="form-control form-control-lg rounded-0" type="text" name="email" value="">
                        </div>
                        <div class="form-group py-2">
                            <input placeholder="* Senha" class="form-control form-control-lg rounded-0" type="password" name="senha" value="">
                        </div>
                        <div class="form-group py-2">
                            <label for="input3">Data de Nascimento</label>
                            <input type="text" class="form-control form-control-lg rounded-0 input3" id="input3" value="">
                            <input type="hidden" name="dt_nasc" value="">
                        </div>
                        <div class="form-group py-2">
                            <select class="form-control form-control-lg rounded-0" name="genero">
                                <option selected hidden disabled>* Genero</option>
                                <option value="0">Mulher</option>
                                <option value="1">Homem</option>
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
</div>
<script src="<?= $this->config->base_url() ?>js/rome.min.js"></script>
<script>
    $(document).ready(function() {
        rome(input3, {
            time: false
        });
    });
    $("#input3").blur(function() {
        var dt_nasc = $("#input3").val();
        $("input[name=dt_nasc]").val(dt_nasc);
    });
</script>