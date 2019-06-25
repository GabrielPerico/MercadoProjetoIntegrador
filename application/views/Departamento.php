<section class="section-main bg padding-bottom">
    <?php

    foreach ($categorias as $c) {

        echo '<div class="container">';
        echo '<div class="row no-gutters border border-top-0 bg-white">';
        echo '<aside class="col-lg-12 align-middle">';
        echo '<div class=" bg-secondary py-4 text-center text-white">';
        echo '<h1> ' . $c->tx_nome . ' </h1>';
        echo '</div>';
        echo '</aside>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
        echo '<section class="section-request bg padding-y-sm">';
        echo '<div class="container">';
        echo '<div class="row-sm">';
        foreach ($produtos as $p) {
            $num = 0;
            if ($p->ref_categoria == $c->id_categoria && $num <= 5) {
                echo '<div class="col-md-2">';
                echo '<figure class="card card-product">';
                echo '<a href="'. base_url('Produto/Info/'.$p->id_produto) .'">';
                echo '<div class="img-wrap"> <img src="' . base_url('uploads/produtos/') . $p->img_imagem . '"></div>';
                echo '<figcaption class="info-wrap">';
                echo '<h6 class="title ">' . $p->tx_nome . '</h6>';
                echo '<div class="price-wrap">';
                if (isset($p->num_porcentagem)) {
                    echo '<span class="price-new">$' . ($p->vl_preco - ($p->vl_preco / (100 / $p->num_porcentagem))) . '</span>';
                    echo '<del class="price-old">$' . $p->vl_preco . '</del>';
                } else {
                    echo '<span class="price-new">$' . $p->vl_preco . '</span>';
                }
                $num++;
                echo '</div>';
                echo '</figcaption></a></figure>';
                echo '</div>';
            }
        }
        echo '<div class="col-md-2"><figure class="card card-product"><a href="' . base_url("Categoria/Listar/".$c->id_categoria) . '">';
        echo '<div class="img-wrap"><img src="' . base_url("uploads/vejamais.png") . '"></div><figcaption class="info-wrap">';
        echo '<h6 class="title ">Ver mais <i class="fas fa-arrow-right"></i></h6><br></figcaption></a></figure></div></div></div></section>';
    }
    ?>