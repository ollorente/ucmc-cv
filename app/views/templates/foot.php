
    <footer id="footer" class="footer">
        <div class="container__fluid footer__container container--sm">
            <div class="footer__conexion">
                <?php if (isset($__isFooterShow)) { ?>
                <div class="footer__left w-30">
                    <a role="button" href="<?= site_url('solicitar-informacion') ?>" class="btn btn--cielo btn__info">¡Solicita Información!</a>
                </div>
                <?php } ?>
                <div class="footer__center w-100">
                    <p class="footer__center--p">
                        <span style="display: block !important;">Todos los derechos reservados <?= date('Y') ?> ©</span>
                        <span style="display: block !important;"><b>Universidad Colegio Mayor de Cundinamarca</b></span>
                        <span style="display: block !important;">Vigilada Mineducación</span>
                    </p>
                </div>
            </div>
            <div class="footer__right">
                <div class="footer__right--one">
                    <p class="footer__right--p">
                        <span><a ref="/"><b>www.unicolmayor.edu.co</b></a></span>
                        <br />
                        <span class="email">sietic@unicolmayor.edu.co</span>
                        <br />
                        <span>(+57 1) 241 8800 Ext. 244</span>
                    </p>
                </div>
                <div class="footer__right--two">
                    <p class="footer__right--p">
                        <span class="footer__redes"><b>Nuestro canal</b></span>
                    </p>
                    <p class="footer__right--p">
                        <a href="https://www.youtube.com/user/sietic1" target="_blank"><i class="fab fa-youtube footer__icon"></i></a>
                        <?php if (isset($__isEmailShow)) { ?>
                        <a href="#" target="_blank"><i class="fas fa-envelope footer__icon"></i></a>
                        <?php } ?>
                    </p>
                </div>
            </div>
        </div>
    </footer>