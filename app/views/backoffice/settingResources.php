<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Categorías de los recursos</b></h1>
			<a href="<?= base_url('backoffice/configuracion/recursos/nuevo') ?>" class="btn btn-outline-primary btn-sm" role="button">Nueva</a>
		</div>

		<div class="col-12">
			<div class="d-flex justify-content-between bg-info text-white">
				<div class="d-flex flex-row">
					<span class="m-2 text-center">ID</span>
					<span class="m-2 text-left">Categoría</span>                
				</div>
				<div class="m-2 text-right">Estado</div>
			</div>

			<?php if ($resourcetaxonomies) { ?>
			<?php foreach ($resourcetaxonomies as $item) { ?>
			<div class="d-flex justify-content-between border-bottom">
				<div class="d-flex flex-row">
					<span class="m-2 text-right"><?= $item['_id'] ?></span>
					<a href="<?= base_url('backoffice/configuracion/recurso/') . $item['resourceTaxonomySlug'] ?>" class="m-2 text-left"><?= $item['resourceTaxonomyName'] ?></a>                
				</div>
				<div class="m-2 text-right">
					<div class="custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" id="index<?= $item['_id'] ?>" <?php if ($item['isResourceTaxonomyActive'] === '1') { echo 'checked'; } else { echo ''; } ?>>
						<label class="custom-control-label" for="index<?= $item['_id'] ?>"></label>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php } else { ?>
			<div class="alert alert-light shadow-sm mt-3" menu="alert">
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
			<div class="btn-group" menu="group" aria-label="Basic example">
				<?php if ($currentpage == 2) { ?>
					<a href="<?= base_url('backoffice/configuracion/recursos') ?>" type="button" class="btn btn--azul">Atrás</a>
				<?php } else { ?>
					<?php if ($currentpage == 1) { ?>
						<a href="#" type="button" class="btn btn--azul disabled">Atrás</a>
					<?php } else { ?>
						<a href="<?= base_url('backoffice/configuracion/recursos') ?>/p/<?= $currentpage - 1 ?>" type="button" class="btn btn--azul">Atrás</a>
					<?php } ?>
				<?php } ?>
				<a href="#" type="button" class="btn btn--azul disabled"><?= $currentpage ?></a>
				<?php if ($currentpage < $lastpage) { ?>
				<a href="<?= base_url('backoffice/configuracion/recursos') ?>/p/<?= $currentpage + 1 ?>" type="button" class="btn btn--azul">Siguiente</a>
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
