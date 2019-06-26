<link rel="stylesheet" href="<?= base_url('css/owl.carousel.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('css/owl.theme.default.min.css') ?>">
<div class="container">
    <div class="row no-gutters">
        <div class="col-lg-9 offset-lg-5-24">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>"> Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('NovosProdutos/Listar') ?>">Novos Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('ProdutosEmPromocao/Listar') ?>">Promoções</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
</section>
<section class="section-main bg padding-bottom">
    <div class="container">
        <div class="row no-gutters border border-top-0 bg-white">
            <aside class="col-lg-5-24">
                <nav>
                    <div class="bg-white col-24">

                        <a id="menu">
                            <div class="title-category bg-secondary white d-none d-lg-block" style="margin-top:-53px">
                                <span>Menu</span>
                            </div>
                        </a>

                        <ul id="menuItens" class="menu-category bg-white border">
                            <?php
                            $count = 0;
                            foreach ($departamentos as $d) {
                                if ($count < 6) {
                                    echo '<li> <a class="text-dark text-decoration-none" href="' . base_url('Departamento/Listar/' . $d->id_departamento) . '">' . $d->tx_nome . '</a></li>';
                                    $count++;
                                } elseif ($count > 6) {
                                    echo '<li> <a class="text-dark text-decoration-none" href="' . base_url('Departamento/Listar/' . $d->id_departamento) . '">' . $d->tx_nome . '</a></li>';
                                } else {
                                    echo '<li class="has-submenu"> <a class="text-dark text-decoration-none" href="#">Outros <i class="icon-arrow-right pull-right"></i></a>';
                                    echo '<ul class="submenu">';
                                    $count++;
                                }
                            }
                            if ($count >= 6) {
                                echo '</ul>';
                            }
                            echo '</ul>';
                            ?>
                    </div>
                </nav>
            </aside>
        </div>
    </div>
</section>
<div class="card my-5">
    <div class="row no-gutters">
        <aside class="col-sm-8 border-right">
            <article class="gallery-wrap">
                <div style="height: 400px;" class="owl-init slider-main owl-carousel" data-items="1" data-nav="true" data-dots="true">
                    <?php
                    foreach ($imagens as $i) {
                        echo '<div style="height: 500px;" class="item-slide ">';
                        echo '<div class="col-md-6 offset-3 mt-4">';
                        echo '<img src="' . base_url('uploads/produtos/' . $i->img_imagem) . '">';

                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </article>
        </aside>
        <aside class="col-sm-4">
            <article class="p-5">
                <h3 class="title mb-3"><?= $produto->tx_nome ?></h3>

                <div class="mb-3">
                    <var class="price h3 text-warning">
                        <span class="currency">R$</span>
                        <?php
                        if (isset($produto->num_porcentagem)) {
                            echo '<span class="num" id="preco">' . ($produto->vl_preco - ($produto->vl_preco / (100 / $produto->num_porcentagem))) . '</span><br>';
                            echo '<del class="price-old">R$ ' . $produto->vl_preco . '</del>';
                        } else {
                            echo '<span class="num" id="preco">' . $produto->vl_preco . '</span>';
                        }

                        ?>
                        <br>
                        <span>Parcelas: </span>
                            <select id="parcelamento">
                                <?php
                                if ($produto->num_parcelamentoMaximo > 0) {
                                    for ($i = 1; $i <= $produto->num_parcelamentoMaximo; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                } else {
                                    echo '<option value="1">1</option>';
                                }
                                ?>
                            </select>
                    </var>
                </div>
                <dl>
                    <dt>Descrição</dt>
                    <dd>
                        <p><?= $produto->tx_descricao ?></p>
                    </dd>
                </dl>
                <dl>
                    <dt>Marca</dt>
                    <dd><?= $produto->tx_marca ?></dd>
                </dl>
            </article>
        </aside>
    </div>
</div>
<script src="<?= base_url('js/userMain.js') ?>"></script>
<script src="<?= base_url('js/user.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('js/owl.carousel.min.js') ?>"></script>