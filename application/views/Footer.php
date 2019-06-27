<footer class="page-footer font-small bg-secondary text-white">

    <div class="container">

        <div class="row">

            <div class="col-md-6 pt-5">
                <div class="mb-5 text-center pt-5">

                    <a class="fb-ic">
                        <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                    <a class="tw-ic">
                        <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 pt-5">
                <div class="mb-5 text-center pt-3 text-justify">
                    <h6>
                        Email: <?= $mercado->tx_email ?>
                        <br>
                        Telefone 1: <?= $mercado->tx_telefone ?>
                        <br>
                        Telefone 2: <?= $mercado->tx_telefone2 ?>
                        <br>
                        Telefone 3: <?= $mercado->tx_telefone3 ?>
                        <br>
                        Telefone 4: <?= $mercado->tx_telefone4 ?>
                        <br>
                        Endereço: <?= $mercado->tx_endereco ?>
                    </h6>
                </div>
            </div>
        </div>

    </div>
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
        Gabriel Perico LTDA.
    </div>

</footer>