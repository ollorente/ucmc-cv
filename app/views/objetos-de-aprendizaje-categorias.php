
    <main id="main" class="main">
        <div class="container">
            <div class="row">

                <div class="col-12 pt-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb  bg--amarillo">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text--blanco font-weight-bold">Inicio</a></li>
                            <li class="breadcrumb-item active font-weight-bold" aria-current="page">Categorías Objetos de aprendizaje</li>
                        </ol>
                    </nav>

                    <h1 class="mt-5 mb-3 text-center title__main h3">Categorías Objetos de aprendizaje</h1>

                </div>
                <div class="col-12">
                    <div class="row">
                        <?php if ($taxonomies) { ?>
                        <?php foreach ($taxonomies as $item) { ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <a href="<?php echo site_url('objetos-de-aprendizaje/categoria'); ?>/<?= $item['objectTaxonomySlug'] ?>">
                                <img src="<?= base_url() .'assets/img/categorias/objetos/'. $item['objectTaxonomySlug'] .'.jpg' ?>" class="card-img-top rounded --shadow mb-3 img--recurso" alt="<?= $item['objectTaxonomyName'] ?>">
                            </a>
                        </div>
                        <?php } ?>
                        <?php } else { ?>
                        <div class="col-12 alert alert-light font-weight-bold" role="alert">
                            En este momento no tenemos ninguno.
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php
                    $currentpage = isset($currentpage) ? $currentpage : 1;
                    if ($currentpage > $lastpage) { $currentpage = $lastpage; };
                    if ($currentpage < 1) { $currentpage = 1; }
                ?>
                <?php if($lastpage > 1) { ?>
                <div class="col-12 my-4 text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <?php if ($currentpage == 2) { ?>
                            <a href="<?= base_url('objetos-de-aprendizaje/categorias') ?>" type="button" class="btn btn--azul">Atrás</a>
                        <?php } else { ?>
                            <?php if ($currentpage == 1) { ?>
                                <a href="#" type="button" class="btn btn--azul disabled">Atrás</a>
                            <?php } else { ?>
                                <a href="<?= base_url('objetos-de-aprendizaje/categorias') ?>/pag/<?= $currentpage - 1 ?>" type="button" class="btn btn--azul">Atrás</a>
                            <?php } ?>
                        <?php } ?>
                        <a href="#" type="button" class="btn btn--azul disabled"><?= $currentpage ?></a>
                        <?php if ($currentpage < $lastpage) { ?>
                        <a href="<?= base_url('objetos-de-aprendizaje/categorias') ?>/pag/<?= $currentpage + 1 ?>" type="button" class="btn btn--azul">Siguiente</a>
                        <?php } ?>
                        <?php if ($currentpage >= $lastpage) { ?>
                        <a href="#" type="button" class="btn btn--azul disabled">Siguiente</a>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </main>