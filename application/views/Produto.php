<link rel="stylesheet" href="<?= base_url('css/owl.carousel.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('css/owl.theme.default.min.css') ?>">

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
            </article> <!-- gallery-wrap .end// -->
        </aside>
        <aside class="col-sm-4">
            <article class="p-5">
                <h3 class="title mb-3"><?= $produto->tx_nome ?></h3>

                <div class="mb-3">
                    <var class="price h3 text-warning">
                        <span class="currency">RS $</span><span class="num"><?= $produto->vl_preco ?></span>
                    </var>
                </div> <!-- price-detail-wrap .// -->
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
<script type="text/javascript" src="<?= base_url('js/owl.carousel.min.js') ?>"></script>