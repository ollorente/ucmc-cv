
        <!-- Begin Page Content -->
        <div class="container-fluid" id="main">

          <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center mb-4">
              <h1 class="h3 text-gray-800">Usuarios</h1>
              <a href="<?= base_url('backoffice/usuarios/nuevo') ?>" class="btn btn-outline-primary btn-sm" role="button">Nuevo</a>
            </div>
  
            <div class="col-12">
              <div class="d-flex justify-content-between bg-info text-white">
                <div class="d-flex flex-row">
                  <span class="m-2 text-center">ID</span>
                  <span class="m-2 text-left">Usuario</span>                
                </div>
                <div class="d-flex flex-row-reverse">
                  <span class="m-2 text-right">Nivel</span>
                </div>
              </div>
  
              <?php if ($users) { ?>
              <?php foreach ($users as $item) { ?>
              <div class="d-flex justify-content-between border-bottom">
                <div class="d-flex flex-row">
                  <span class="m-2 text-right"><?= $item['user_id'] ?></span>
                  <a href="<?= base_url('backoffice/usuario/') . $item['user_id'] ?>" class="m-2 text-left"><?= $item['username'] ?></a>                
                </div>
                <div class="m-2 d-flex flex-row-reverse align-items-center">
                  <?php if ( $item['banned'] == 1 ) { ?><span class="badge badge-danger">Banneado</span><?php } ?>
                  <span class="m-2 text-left mx-4">
                    <?php
                      switch ($item['auth_level']) {
                        case 1:
                          echo 'Estudiante';
                          break;
                        case 2:
                          echo 'Invitado';
                          break;
                        case 3:
                          echo 'Empleado';
                          break;
                        case 4:
                          echo 'Docente';
                          break;
                        case 6:
                          echo 'Administrador';
                          break;
                        case 9:
                          echo 'Superusuario';
                          break;
                      }
                    ?>
                  </span>
                </div>
              </div>
              <?php } ?>
              <?php } else { ?>
              <div class="alert alert-light shadow-sm mt-3" user="alert">
                No hay items activos.
              </div>
              <?php } ?>

            </div>
            <?php
                $currentpage = isset($currentpage) ? $currentpage : 1;
                if ($currentpage > $lastpage) { $currentpage = $lastpage; };
                if ($currentpage < 1) { $currentpage = 1; }
            ?>
            <?php if($lastpage > 1) { ?>
            <div class="col-12 my-4 text-center">
                <div class="btn-group" user="group" aria-label="Basic example">
                    <?php if ($currentpage == 2) { ?>
                        <a href="<?= base_url('backoffice/usuario') ?>" type="button" class="btn btn--azul">Atrás</a>
                    <?php } else { ?>
                        <?php if ($currentpage == 1) { ?>
                            <a href="#" type="button" class="btn btn--azul disabled">Atrás</a>
                        <?php } else { ?>
                            <a href="<?= base_url('backoffice/usuario') ?>/p/<?= $currentpage - 1 ?>" type="button" class="btn btn--azul">Atrás</a>
                        <?php } ?>
                    <?php } ?>
                    <a href="#" type="button" class="btn btn--azul disabled"><?= $currentpage ?></a>
                    <?php if ($currentpage < $lastpage) { ?>
                    <a href="<?= base_url('backoffice/usuario') ?>/p/<?= $currentpage + 1 ?>" type="button" class="btn btn--azul">Siguiente</a>
                    <?php } ?>
                    <?php if ($currentpage >= $lastpage) { ?>
                    <a href="#" type="button" class="btn btn--azul disabled">Siguiente</a>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>

          </div>

        </div>
        <!-- /.container-fluid -->