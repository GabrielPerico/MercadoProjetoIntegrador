<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $this->config->base_url() ?>css/ui.css">
    <link rel="stylesheet" href="<?= $this->config->base_url() ?>css/responsive.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>Mercado - <?= $mercado->tx_nome ?></title>
</head>

<body>
    <nav class="navbar navbar-top navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTop">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"> <i class="fa fa-phone"></i> Telefone: <?= $mercado->tx_telefone ?> </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li><a href="#" class="nav-link text-white"> Minha Conta </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="header-main">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5-24 col-sm-5 col-4">
                    <div class="brand-wrap">
                        <img class="logo" src="<?= $this->config->base_url() ?>Uploads/logo/<?= $mercado->img_logo ?>">
                        <h2 class="logo-text"><?= $mercado->tx_nome ?></h2>
                    </div>
                </div>
                <div class="col-lg-13-24 col-sm-12 order-3 order-lg-2">
                    <form action="#">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" style="width:60%;" placeholder="Procurar">

                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6-24 col-sm-7 col-8  order-2  order-lg-3">
                    <div class="d-flex justify-content-end">
                        <div class="widget-header">
                            <small class="title text-center text-white badge badge-primary py-2"><?= (($this->session->userdata('nome') !== null)) ? 'Bem vindo <br>' . $this->session->userdata('nome') : 'Seja bem vindo! '; ?></small>
                            <?= (($this->session->userdata('nome') !== null)) ?  '' : '<div> <a href="#">Entrar</a> <span class="dark-transp"> | </span>
                                <a href="#"> Registrar</a></div>' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>