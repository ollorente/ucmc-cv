

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Derechos reservados &copy; Universidad Colegio Mayor de Cundinamarca <?= date('Y') ?></span>
        </div>
      </div>
    </footer>
    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Confirma que quiere salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo/a para finalizar su sesión actual.</div>
        <div class="modal-footer">
          <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-danger" href="<?= base_url('login?logout=1') ?>">Cerrar sesión</a>
        </div>
      </div>
    </div>  
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/backoffice/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/backoffice/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/backoffice/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/backoffice/js/sb-admin-2.min.js') ?>"></script>

  <!-- Page level plugins -->
  <!-- <script src="<?= base_url('assets/backoffice/vendor/chart.js/Chart.min.js') ?>"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="<?= base_url('assets/backoffice/js/demo/chart-area-demo.js') ?>"></script> -->
  <!-- <script src="<?= base_url('assets/backoffice/js/demo/chart-pie-demo.js') ?>"></script> -->
  
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="<?= base_url('assets/backoffice/js/main.js') ?>"></script>

</body>

</html>