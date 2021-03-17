
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
      </div>

      <!-- Content Row -->
      <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <a href="<?= base_url('/backoffice/cursos') ?>">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cursos</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_courses ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fab fa-discourse fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <a href="<?= base_url('/backoffice/diplomados') ?>">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Diplomados</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_graduates ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <a href="<?= base_url('/backoffice/programas') ?>">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Programas</div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $count_programs ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <a href="<?= base_url('/backoffice/herramientas') ?>">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Herramientas</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_tools ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-tools fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <a href="<?= base_url('/backoffice/tutoriales') ?>">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tutoriales</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_tutorials ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-magic fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <a href="<?= base_url('/backoffice/objetos') ?>">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Objetos</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_objects ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-object-ungroup fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <a href="<?= base_url('/backoffice/recursos') ?>">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Recursos</div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $count_resources ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fab fa-sourcetree fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <a href="<?= base_url('/backoffice/usuarios') ?>">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Usuarios</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_users ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>

      <!-- Content Row -->
      <div class="row">

        <div class="col-lg-6 mb-4" hidden>

          <!-- Approach -->
          <?php if ($messagesList) { ?>
          <?php foreach ($messagesList as $item) { ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('backoffice/solicitud/') . $item['_id'] ?>"><?= $item['requestSubject'] ?></a></h6>
            </div>
            <div class="card-body">
              <p><?= substr($item['requestMessage'], 0, 255) ?></p>
            </div>
          </div>
          <?php } ?>
          <?php } ?>

        </div>

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

          <!-- Project Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
            </div>
            <div class="card-body">
              <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
              <div class="progress mb-4">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
              <div class="progress mb-4">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
              <div class="progress mb-4">
                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
              <div class="progress mb-4">
                <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
              <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>

          <!-- Color System -->
          <div class="row">
            <div class="col-lg-6 mb-4">
              <div class="card bg-primary text-white shadow">
                <div class="card-body">
                  Primary
                  <div class="text-white-50 small">#4e73df</div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card bg-success text-white shadow">
                <div class="card-body">
                  Success
                  <div class="text-white-50 small">#1cc88a</div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card bg-info text-white shadow">
                <div class="card-body">
                  Info
                  <div class="text-white-50 small">#36b9cc</div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card bg-warning text-white shadow">
                <div class="card-body">
                  Warning
                  <div class="text-white-50 small">#f6c23e</div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card bg-danger text-white shadow">
                <div class="card-body">
                  Danger
                  <div class="text-white-50 small">#e74a3b</div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card bg-secondary text-white shadow">
                <div class="card-body">
                  Secondary
                  <div class="text-white-50 small">#858796</div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card bg-light text-black shadow">
                <div class="card-body">
                  Light
                  <div class="text-black-50 small">#f8f9fc</div>
                </div>
              </div>
          </div>
          <div class="col-lg-6 mb-4">
            <div class="card bg-dark text-white shadow">
              <div class="card-body">
                  Dark
                  <div class="text-white-50 small">#5a5c69</div>
              </div>
            </div>
          </div>
        </div>

        </div>
      </div>

    </div>
    <!-- /.container-fluid -->