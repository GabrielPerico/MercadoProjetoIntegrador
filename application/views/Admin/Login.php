<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login de Usuário - Sistema de Gincana</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
<div class="container my-5 pt-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card rounded-0 shadow-lg">
                <div class="card-header bg-dark text-center text-white">
                    <h3 class="mb-0">Login de Usuário</h3>
                </div>
                <div class="card-body col-8 mx-auto">

                <?php
                $mensagem = $this->session->flashdata('mensagem');
                echo (isset($mensagem) ? ' <div class="alert alert-danger" role="alert">' . $mensagem . '</div>' : '');
                ?>
                <form action="" method="POST" name="login">
                    <div class="form-group py-2">
                        <input placeholder="example@email.com" type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group py-2">
                        <input placeholder="senha" type="password" class="form-control" name="senha" id="senha">
                    </div>
                    <hr>
                    <div class="form-group py-2 text-center">
                        <button type="submit" class="btn btn-success ">
                            <i class="fas fa-check"></i> Acessar
                        </button>
                        <a class="ml-5" href="<?= $this->config->base_url() . 'Usuario/Recuperar' ?>">Esqueceu a senha?</a>
                    </div>
            </div>
        </div>
    </div>
</body>

</html>