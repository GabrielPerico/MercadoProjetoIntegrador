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
  <link rel="stylesheet" href="<?= $this->config->base_url() ?>css/style.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://nosir.github.io/cleave.js/dist/cleave.min.js"></script>
  <title>Mercado - Admin</title>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-nav">
    <div class="container">
      <a class="navbar-brand" href="<?= $this->config->base_url() ?>Admin/Mercado">Mercado</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample07">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produtos</a>
            <div class="dropdown-menu" aria-labelledby="dropdown07">
              <a class="dropdown-item" href="<?= $this->config->base_url() ?>Admin/Produtos/Listar">Produtos</a>
              <a class="dropdown-item" href="<?= $this->config->base_url() ?>Admin/Categoria/Listar">Categorias</a>
              <a class="dropdown-item" href="<?= $this->config->base_url() ?>Admin/Departamento/Listar">Departamentos</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $this->config->base_url() ?>Admin/Fornecedores/Listar">Fornecedores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $this->config->base_url() ?>Admin/Promocao/Listar">Promoção</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $this->config->base_url() ?>Admin/Anuncio">Anuncio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $this->config->base_url() ?>Admin/Mercado">Mercado</a>
          </li>
        </ul>
      </div>
    </div>
    <ul class="navbar-nav ml-auto text-white">
      <li class="navbar-item">
        <a href="#" class="nav-link">

          <i class="fas fa-user-circle mr-1"></i>
          <?= $this->session->userdata('nome') ?>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-3 text-white">
      <li class="nav-item">
        <a class="nav-link" href="<?= $this->config->base_url() . 'Admin/Usuario/sair'; ?>">
          <i class="fas fa-sign-out-alt"></i> Sair
        </a>
      </li>
    </ul>
    </div>
  </nav>