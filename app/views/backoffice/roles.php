
        <!-- Begin Page Content -->
        <div class="container-fluid" id="main">

          <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center mb-4">
              <h1 class="h3 text-gray-800">Roles</h1>
              <a href="<?= base_url('backoffice/roles/nuevo') ?>" class="btn btn-outline-primary btn-sm" role="button">Nuevo</a>
            </div>
  
            <div class="col-12">
              <div class="d-flex justify-content-between bg-info text-white">
                <div class="d-flex flex-row">
                  <span class="m-2 text-center">ID</span>
                  <span class="m-2 text-left">Rol</span>                
                </div>
                <div class="d-flex flex-row-reverse">
                  <span class="m-2 text-right">Estado</span>
                  <span class="m-2 text-right">Orden</span>
                </div>
              </div>
  
              <?php if ($roles) { ?>
              <?php foreach ($roles as $item) { ?>
              <div class="d-flex justify-content-between border-bottom">
                <div class="d-flex flex-row">
                  <span class="m-2 text-right"><?= $item['_id'] ?></span>
                  <a href="<?= base_url('backoffice/role/') . $item['_id'] ?>" class="m-2 text-left"><?= $item['roleName'] ?></a>                
                </div>
                <div class="m-2 d-flex flex-row-reverse align-items-center">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="index<?= $item['_id'] ?>" <?php if ($item['isRoleActive'] === '1') { echo 'checked="checked"'; } else { echo ''; } ?>>
                    <label class="custom-control-label" for="index<?= $item['_id'] ?>"></label>
                  </div>
                  <span class="m-2 text-left mx-4"><?= $item['roleOrder'] ?></span>
                </div>
              </div>
              <?php } ?>
              <?php } else { ?>
              <div class="alert alert-light shadow-sm mt-3" role="alert">
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
                <div class="btn-group" role="group" aria-label="Basic example">
                    <?php if ($currentpage == 2) { ?>
                        <a href="<?= base_url('backoffice/roles') ?>" type="button" class="btn btn--azul">Atrás</a>
                    <?php } else { ?>
                        <?php if ($currentpage == 1) { ?>
                            <a href="#" type="button" class="btn btn--azul disabled">Atrás</a>
                        <?php } else { ?>
                            <a href="<?= base_url('backoffice/roles') ?>/p/<?= $currentpage - 1 ?>" type="button" class="btn btn--azul">Atrás</a>
                        <?php } ?>
                    <?php } ?>
                    <a href="#" type="button" class="btn btn--azul disabled"><?= $currentpage ?></a>
                    <?php if ($currentpage < $lastpage) { ?>
                    <a href="<?= base_url('backoffice/roles') ?>/p/<?= $currentpage + 1 ?>" type="button" class="btn btn--azul">Siguiente</a>
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