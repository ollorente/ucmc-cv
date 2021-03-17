
    <main id="main" class="main">
        <div class="container">
            <div class="row">

                <div class="col-12 pt-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg--amarillo">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text--blanco font-weight-bold">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('banco-de-recursos/categorias') ?>" class="text--blanco font-weight-bold">Banco de recursos</a></li>
                            <li class="breadcrumb-item active font-weight-bold" aria-current="page">Recurso</li>
                        </ol>
                    </nav>

                    <h2 class="mt-5 mb-3 text-center title__main h3">Banco de recursos</h2>

                    <div class="row" hidden>
                        <form class="mb-5 col-sm-8 offset-sm-2">
                            <div class="input-group mb-3">
                                <input type="search" class="form-control --border-0" placeholder="Buscar" aria-label="Buscar" aria-describedby="buscar">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary bg--blanco --border-0" id="buscar" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mb-4 --border-radius-1">
                    <div class="card-body p-3">
                        <div class="row">
    
                            <div class="col-12 col-md-6 offset-md-3 mb-5">
                                <div class="mb-0 pb-4">
                                    <ul class="ratio16x9 p-0 rounded" style="list-style: none; background: #fff;">
                                        <li class="text-center"><img src="<?= $resource->resourceLink ?>" class="img-fluid m-1" alt=""></li>
                                    </ul>
                                </div>
                                <h1 class="mt-0 mb-3 font-weight-bold h5 text-uppercase text-center" style="font-family: arial, san-serif;">ID foto: <?= $resource->resourceCode ?></h1>
                                <p class="my-3 text-center">Categoría: <a href="<?= base_url('banco-de-recursos/categoria/') . $taxonomy->resourceTaxonomySlug ?>"><?= $taxonomy->resourceTaxonomyName ?></a></p>
                                <div class="text-center">
                                    <?= form_open('/recurso/' . $resource->resourceCode . '/descargar') ?>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn--azul font-weight-bold">Descargar</button>
                                        </div>
                                    <?= form_close() ?>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-12 col-md-12 mb-4">
                            <hr>
                            <h2 class="font-weight-bold">Otras imágenes</h2>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="row">
    
                                <?php if ($random) { ?>
                                <?php foreach ($random as $item) { ?>
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                    <div class="card border-0 shadow-sm mb-4 color-card-blue w-100">
                                        <a href="<?= base_url('recurso/') . $item['resourceCode'] ?>"><img src="<?= base_url($item['resourceLink']) ?>" class="card-img-top img-obj" alt="<?= $item['resourceCode'] ?>"></a>
                                        <div class="card-body mx-1 px-1">
                                            <p class="card-text mb-1"><span class="font-weight-bold small">ID foto:</span> <?= $item['resourceCode'] ?></p>
                                            <p class="card-text"></p>
                                        </div>
                                        <ul class="nav nav-pills nav-fill mb-3">
                                            <li class="nav-item">
                                                <a class="nav-link py-0 text-uppercase font-weight-bold text-dark" href="<?= base_url('recurso/') . $item['resourceCode'] ?>">Solicitar</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
        
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>