
    <main id="main" class="main">
        <div class="container">
            <div class="row">

                <div class="col-12 pt-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb  bg--amarillo">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text--blanco font-weight-bold">Inicio</a></li>
                            <li class="breadcrumb-item active font-weight-bold" aria-current="page">Formación virtual</li>
                        </ol>
                    </nav>

                    <h1 class="mt-5 mb-3 text-center title__main h3">Formación virtual</h1>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="h3 text-center my-4">Cursos Virtuales</h2>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-2">
                            <div class="card mb-3 pb-4 --border-0 --shadow">
                                <h2 class="card__label bg--cielo text--blanco --shadow">Oferta<br /><span class="numeral"><?= $courses_count ?></span></h2>
                                <div class="card__label__detalle bg--cielo"></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-9 col-lg-10">
                            <?php if ($courses) { ?>
                            <?php foreach ($courses as $item) { ?>
                            <div class="card --border-0 --shadow-sm mb-2 --border-radius-1">
                                <div class="card__body p-2"><a href="<?= $item['courseNameUrl'] ?>" class="text-dark font-weight-bold d-flex flex-row align-items-center"><i class="fab fa-discourse text--azul mr-2"></i> <?= $item['courseName'] ?></a></div>
                            </div>
                            <?php } ?>
                            <?php  } else { ?>
                            <div class="card --border-0 --shadow-sm mb-2 --border-radius-1">
                                <div class="card__body p-2 font-weight-bold">En este momento no tenemos ninguno.</div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="h3 text-center my-4">Diplomados</h2>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-2">
                            <div class="card mb-3 pb-4 --border-0 --shadow">
                                <h2 class="card__label bg--cielo text--blanco --shadow">Oferta<br /><span class="numeral"><?= $graduates_count ?></span></h2>
                                <div class="card__label__detalle bg--cielo"></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-9 col-lg-10">
                            <?php if ($graduates) { ?>
                            <?php foreach ($graduates as $item) { ?>
                            <div class="card --border-0 --shadow-sm mb-2 --border-radius-1">
                                <div class="card__body p-2"><a href="<?= $item['graduateNameUrl'] ?>" class="text-dark font-weight-bold d-flex flex-row align-items-center"><i class="fab fa-discourse text--azul mr-2"></i> <?= $item['graduateName'] ?></a></div>
                            </div>
                            <?php } ?>
                            <?php } else { ?>
                            <div class="card --border-0 --shadow-sm mb-2 --border-radius-1">
                                <div class="card__body p-2 font-weight-bold">En este momento no tenemos ninguno.</div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="h3 text-center my-4">Programas</h2>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-2">
                            <div class="card mb-3 pb-4 --border-0 --shadow">
                                <h2 class="card__label bg--cielo text--blanco --shadow">Oferta<br /><span class="numeral"><?= $programs_count ?></span></h2>
                                <div class="card__label__detalle bg--cielo"></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-9 col-lg-10">
                            <?php if ($programs) { ?>
                            <?php foreach ($programs as $item) { ?>
                            <div class="card --border-0 --shadow-sm mb-2 --border-radius-1">
                                <div class="card__body p-2"><a href="<?= $item['programNameUrl'] ?>" class="text-dark font-weight-bold d-flex flex-row align-items-center"><i class="fab fa-discourse text--azul mr-2"></i> <?= $item['programName'] ?></a></div>
                            </div>
                            <?php } ?>
                            <?php } else { ?>
                            <div class="card --border-0 --shadow-sm mb-2 --border-radius-1">
                                <div class="card__body p-2 font-weight-bold">En este momento no tenemos ninguno.</div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>