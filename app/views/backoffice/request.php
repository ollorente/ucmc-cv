<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
    <div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800"><?= $request->requestSubject ?></h1>
			<a href="<?= base_url('backoffice/solicitudes') ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

    <div class="col-12">
      <div class="row">
        <div class="col-12 col-sm-6">
          <p>
            <b class="text-dark"><?= $request->requestName ?></b><br>
            <?= $request->requestEmail ?><br>
            <?= $request->requestIP ?>
          </p>
        </div>
        <div class="col-12 col-sm-6 text-right">
          <?php $fecha = explode(' ', $request->requestData); echo $fecha[0] ?><br>
          <button class="btn btn-outline-success btn-sm mt-2">Responder</button>
        </div>
        <div class="col-12">
          <p class="p-3"><?= $request->requestMessage ?></p>
          <hr>
          <p class="text-center">
            <button class="btn btn-outline-warning">Marcar como no leído</button>
            <button class="btn btn-outline-danger">Eliminar</button>
          </p>
        </div>
      </div>
      <?= $request->_id ?>
      <?= $request->isRequestActive ?>
      <?= $request->isRequestLock ?>
    </div>

	</div>

</div>
<!-- /.container-fluid -->
