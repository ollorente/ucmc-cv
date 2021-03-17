
    <main id="main" class="main">
        <div class="container">
            <div class="row">

                <div class="col-12 pt-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb  bg--amarillo">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text--blanco font-weight-bold">Inicio</a></li>
                            <li class="breadcrumb-item active font-weight-bold" aria-current="page">Herramientas para estudiantes</li>
                        </ol>
                    </nav>

                    <h1 class="mt-5 mb-3 text-center title__main h3">Herramientas para estudiantes</h1>
                </div>
                
                <div class="col-12 pt-2">
                    <div class="row">
                        <?php if ($tools) { ?>
                            <?php foreach ($tools as $item) { ?>
					<div class="col-12 col-sm-6 col-md-4 col-lg-3">
						<a href="<?= $item['toolNameUrl'] ?>" target="_blank">
							<div class="card mb-4 --shadow-sm --border-radius-1 --border-0">
								<?php if ($item['toolImageUrl']) { ?>
								<img src="<?= $item['toolImageUrl'] ?>" class="card-img-top rounded-top img-tutorial"
									alt="<?= $item['toolName'] ?>">
								<?php } else { ?>
								<img src="<?= base_url() ?>assets/img/default.png"
									class="card-img-top rounded-top img-tutorial" alt="<?= $item['toolName'] ?>">
								<?php } ?>
								<div class="card-body p-3">
									<h3 class="card-text text-dark font-weight-bold h5"
										style="font-family: 'arial', sans-serif;"><?= $item['toolName'] ?></h3>
									<small class="card-text text-dark font-weight-bold h6"
										style="font-family: 'arial', sans-serif;"><?= $item['toolDescription'] ?></small>
								</div>
							</div>
						</a>
					</div>
					<?php } ?>
                        <?php } else { ?>
                        <div class="col-12 alert alert-light font-weight-bold" role="alert">
                            En este momento no tenemos ninguna.
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
                            <a href="<?= base_url('herramientas-para-estudiantes') ?>" type="button" class="btn btn--azul">Atrás</a>
                        <?php } else { ?>
                            <?php if ($currentpage == 1) { ?>
                                <a href="#" type="button" class="btn btn--azul disabled">Atrás</a>
                            <?php } else { ?>
                                <a href="<?= base_url('herramientas-para-estudiantes') ?>/pag/<?= $currentpage - 1 ?>" type="button" class="btn btn--azul">Atrás</a>
                            <?php } ?>
                        <?php } ?>
                        <a href="#" type="button" class="btn btn--azul disabled"><?= $currentpage ?></a>
                        <?php if ($currentpage < $lastpage) { ?>
                        <a href="<?= base_url('herramientas-para-estudiantes') ?>/pag/<?= $currentpage + 1 ?>" type="button" class="btn btn--azul">Siguiente</a>
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