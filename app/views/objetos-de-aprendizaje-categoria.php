
    <main id="main" class="main">
        <div class="container">
            <div class="row">

                <div class="col-12 pt-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb  bg--amarillo">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text--blanco font-weight-bold">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('objetos-de-aprendizaje/categorias') ?>" class="text--blanco font-weight-bold">Categoría objetos de aprendizaje</a></li>
                            <li class="breadcrumb-item active font-weight-bold" aria-current="page"><?= $category->objectTaxonomyName ?></li>
                        </ol>
                    </nav>

                    <h1 class="mt-5 mb-3 text-center title__main h3">
                        <small>Objetos de aprendizaje</small><br/><span>"<?= $category->objectTaxonomyName ?>"</span>
                    </h1>

                    <?php if (isset($__Search)) { ?>
                    <div class="row">
                        <form class="mb-5 col-sm-8 offset-sm-2">
                            <div class="input-group mb-3">
                                <input type="search" class="form-control --border-0" placeholder="Buscar" aria-label="Buscar" aria-describedby="buscar">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary bg--blanco --border-0" id="buscar" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-12">
                    <div class="row">
                        <?php if ($objects) { ?>
                        <?php foreach ($objects as $item) { ?>
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="card mb-4 --shadow-sm --border-radius-1 --border-0">
                                <img src="<?= $item['objectLink'] ?>" class="card-img-top" alt="<?= $item['objectTitle'] ?>">
                                <div class="card-body">
                                    <h5 class="card-title card__title-truncate"><?= $item['objectTitle'] ?></h5>
                                    <a href="#" class="btn btn--azul btn-block" data-toggle="modal" data-target="#<?= $item['objectObject'] ?>Modal">VER</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <?php foreach ($objects as $item) { ?>
                        <div class="modal fade" id="<?= $item['objectObject'] ?>Modal" tabindex="-1" role="dialog" aria-labelledby="<?= $item['objectObject'] ?>ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header bg--ocre --border-0">
                                        <h5 class="modal-title" id="<?= $item['objectObject'] ?>ModalLabel"><?= $item['objectTitle'] ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body p-0">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe id="video" class="embed-responsive-item video" src="https://www.youtube.com/embed/<?= $item['objectYoutube'] ?>?rel=0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="modal-footer --border-0">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn--cielo" hidden>Solicitar</button>
                                        <div class="container mt-5" style="font-family: 'Arial', sans-serif;">
                                            <span>Si usted es docente de la universidad y desea utilizar este "Objeto de Aprendizaje en paquete SCORM" para su clase, escríbanos a <b>sietic@unicolmayor.edu.co</b> solicitándolo desde su <b>Correo Institucional</b>.</span>
                                            <br />
                                            <br />
                                            <span><b>Asunto: </b>Solicitud Objeto de Aprendizaje: "<?= $item['objectTitle'] ?>".</span>
                                            <br />
                                            <span><b>Mensaje: </b><b>Ref: </b><?= $item['_id'] ?>-<?= strtoupper($item['objectObject']) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            <a href="<?= base_url('objetos-de-aprendizaje/categoria/') . $category->objectTaxonomySlug ?>" type="button" class="btn btn--azul">Atrás</a>
                        <?php } else { ?>
                            <?php if ($currentpage == 1) { ?>
                                <a href="#" type="button" class="btn btn--azul disabled">Atrás</a>
                            <?php } else { ?>
                                <a href="<?= base_url('objetos-de-aprendizaje/categoria/') . $category->objectTaxonomySlug ?>/pag/<?= $currentpage - 1 ?>" type="button" class="btn btn--azul">Atrás</a>
                            <?php } ?>
                        <?php } ?>
                        <a href="#" type="button" class="btn btn--azul disabled"><?= $currentpage ?></a>
                        <?php if ($currentpage < $lastpage) { ?>
                        <a href="<?= base_url('objetos-de-aprendizaje/categoria/') . $category->objectTaxonomySlug ?>/pag/<?= $currentpage + 1 ?>" type="button" class="btn btn--azul">Siguiente</a>
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