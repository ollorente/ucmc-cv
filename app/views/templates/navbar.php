    <header id="header" class="header">
        <div class="container header__container d-flex justify-content-between align-items-center">
            <div class="header__brand">
                <a href="<?= base_url() ?>" class="header__logo"><img class="header__logo-img" src="<?= base_url('assets/img/logo.svg') ?>" alt="Logo UCMC"></a>
            </div>
            <a href="<?= base_url() ?>" class="title text--azul">
                <span class="title__main">Campus Virtual</span>
                <span class="title__sub">Universidad Colegio Mayor de Cundinamarca</span>
            </a>
            <div class="header__search">
                <a href="http://presencial-new.unicolmayor.edu.co/"><img src="<?= base_url('/assets/img/moodle.png') ?>" alt="Ingreso a plataforma Moodle" class="img-moodle"></a>
                <?php if (isset( $__Search )) { ?>
                <form action="<?= base_url('buscar') ?>" class="form-inline my-2 my-lg-0" hidden>
                    <div class="input-group">
                        <input type="text" class="form-control bg--cielo text--azul border-0" placeholder="" aria-label="Buscar" aria-describedby="buscar">
                        <div class="input-group-append">
                            <button class="btn btn--cielo border-0" type="submit" id="buscar"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <?php } ?>
                <?php if (isset( $__Auth )) { ?>
                <?php if ( isset( $auth_user_id ) ) { ?>
                <a href="<?= base_url('login?logout=1') ?>">Salir</a>
                <?php } ?>
                <?php } ?>
            </div>
            <?php if (isset( $__Search )) { ?>
            <button class="btn btn--blanco border-0 magnificent-glass" id="magnificent-glass" data-toggle="modal" data-target="#searchModal"><i class="fas fa-search"></i></button>
            <?php } ?>
            <a href="http://presencial-new.unicolmayor.edu.co/" class="btn btn--blanco border-0 magnificent-glass" id="magnificent-glass"><img src="<?= base_url('/assets/img/moodle-icon.png') ?>" alt="Ingreso a plataforma Moodle" class="img-moodle-icon"></a>
        </div>
        <?php if (isset( $__Search )) { ?>
        <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content --border-0" style="border-radius: 1rem;">
                    <div class="search-form" id="search-form">
                        <form action="<?= base_url('buscar') ?>" class="form-inline my-2 my-lg-0">
                            <div class="input-group">
                                <input type="text" class="form-control bg--cielo text--azul border-0" placeholder=""
                                    aria-label="Buscar" aria-describedby="buscar">
                                <div class="input-group-append">
                                    <button class="btn btn--cielo border-0" type="submit" id="buscar"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </header>