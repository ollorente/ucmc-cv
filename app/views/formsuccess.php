
    <main id="main" class="main">
        <div class="container">
            <div class="row">

                <div class="col-12 pt-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb  bg--amarillo">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text--blanco font-weight-bold">Inicio</a></li>
                            <li class="breadcrumb-item active font-weight-bold" aria-current="page">Solicitar información</li>
                        </ol>
                    </nav>

                    <h1 class="mt-5 mb-3 text-center title__main h3">Solicitar información</h1>
                </div>
                
                <div class="col-12 col-sm-8 col-lg-6 offset-sm-2 offset-lg-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-3">
                            <h3 class="text-center">¡Tu solicitud se ha enviado correctamente!</h3>
                            <p class="text-center"><?= anchor('/', 'Volver!'); ?></p>
                        </div>
                    </div>                    
                </div>

            </div>
        </div>
    </main>