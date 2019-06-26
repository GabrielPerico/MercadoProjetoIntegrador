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
<section class="section-main bg padding-bottom">
    <?php

    echo '<div class="container">';
    echo '<div class="row no-gutters border border-top-0 bg-white">';
    echo '<aside class="col-lg-12 align-middle">';
    echo '<div class=" bg-secondary py-4 text-center text-white">';
    echo '<h1> Novos Produtos </h1>';
    echo '</div>';
    echo '</aside>';
    echo '</div>';
    echo '</div>';
    echo '</section>';
    echo '<section class="section-request bg padding-y-sm">';
    echo '<div class="container">';
    echo '<div class="row-sm">';
    foreach ($produtos as $p) {
        echo '<div class="col-md-2">';
        echo '<figure class="card card-product">';
        echo '<a href="' . base_url('Produto/Info/' . $p->id_produto) . '">';
        echo '<div class="img-wrap pt-5"> <img src="' . base_url('uploads/produtos/') . $p->img_imagem . '"></div>';
        echo '<figcaption class="info-wrap">';
        echo '<h6 class="title ">' . $p->tx_nome . '</a></h6>';
        echo '<div class="price-wrap">';
        if (isset($p->num_porcentagem)) {
            echo '<span class="price-new">$' . ($p->vl_preco - ($p->vl_preco / (100 / $p->num_porcentagem))) . '</span>';
            echo '<del class="price-old">$' . $p->vl_preco . '</del>';
        } else {
            echo '<span class="price-new">$' . $p->vl_preco . '</span>';
        }
        echo '</div>';
        echo '</figcaption></figure>';
        echo '</div>';
    }
    echo '</figcaption></a></figure></div></div></div></section>';
    ?>
    <script src="<?= base_url('js/user.js') ?>"></script>