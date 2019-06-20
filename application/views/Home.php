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
                            <a class="nav-link" href="#"> Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Novos Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Promoções</a>
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
                    <div class="title-category bg-secondary white d-none d-lg-block" style="margin-top:-53px">
                        <span>Categorias</span>
                    </div>
                    <ul class="menu-category">
                        <?php
                        $count = 0;
                        foreach ($categorias as $c) {
                            if ($count < 6) {
                                echo '<li> <a href="' . base_url('Categoria/' . $c->id_categoria) . '">' . $c->tx_nome . '</a></li>';
                                $count++;
                            } elseif ($count > 6) {
                                echo '<li> <a href="' . base_url('Categoria/' . $c->id_categoria) . '">' . $c->tx_nome . '</a></li>';
                            } else {
                                echo '<li class="has-submenu"> <a href="#">Mais Categorias <i class="icon-arrow-right pull-right"></i></a>';
                                echo '<ul class="submenu">';
                                $count++;
                            }
                        }
                        if ($count >= 6) {
                            echo '</ul>';
                        }
                        echo '</ul>';
                        ?>
                </nav>
            </aside>
            <main class="col-lg-19-24">
                <div class="row no-gutters">
                    <div class="col-lg-12 col-md-12">
                        <div class="owl-init slider-main owl-carousel" data-items="1" data-margin="1" data-nav="true" data-dots="false">
                            <?php
                            foreach ($anuncios as $a) {
                                if ($a->sl_mostrar == 1) {
                                    echo '<div class="item-slide">';
                                    echo '<img src="' . base_url('uploads/anuncios/' . $a->img_imagem) . '">';
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
</section>  






<script src="<?= base_url('js/userMain.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('js/owl.carousel.min.js') ?>"></script>