
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
                    <div class="card border-0 shadow-sm --border-radius-1">
                        <div class="card-body">
                            <?= '<span class="text-danger font-weight-bold">'. validation_errors() .'</span>' ?>
                            <?= form_open() ?>
                                <div class="form-group">
                                    <label for="name">Nombre *</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Juan Pérez" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo electrónico *</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="juan.perez@micorreo.com" required>
                                </div>
                                <div class="form-group">
                                    <label for="subject">Asunto *</label>
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" required>
                                </div>
                                <div class="form-group">
                                    <label for="information">Información *</label>
                                    <textarea class="form-control" name="information" id="information" rows="5" placeholder="Información" required></textarea>
                                </div>
                                <button type="submit" class="btn btn--azul btn-block">Enviar</button>
                                <div class="form-group m-0 pt-4">
                                    <small class="font-weight-bold">* Campos requeridos</small>
                                </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>