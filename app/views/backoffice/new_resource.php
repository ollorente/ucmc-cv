<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Nuevo recurso</h1>
			<a href="<?= base_url('backoffice/recursos') ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

			<?= '<span class="text-danger font-weight-bold">'. validation_errors() .'</span>' ?>
			<?= isset( $created ) ? $created : '' ?>
			<?= form_open(); ?>
				<div class="form-group">
					<label for="title">Código *</label>
					<input type="text" class="form-control" name="code" id="code" placeholder="Código *" required autofocus>
				</div>
				<div class="form-group">
					<label for="link">Imagen *</label>
					<input type="text" class="form-control" name="link" id="link" placeholder="Imagen *" required>
				</div>
				<div class="form-group">
					<label for="taxonomy">Taxonomía *</label>
					<select class="form-control" name="taxonomy" id="taxonomy" required>
						<?php foreach ($taxonomies as $item) { ?>
						<option value="<?= $item['_id'] ?>"><?= $item['resourceTaxonomyName'] ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="area">Área</label>
					<input type="text" class="form-control" name="area" id="area" placeholder="Área">
				</div>
				<div class="form-group">
					<label for="knowless_topic">Área del conocimiento</label>
					<input type="text" class="form-control" name="knowless_topic" id="knowless_topic" placeholder="Área del conocimiento">
				</div>
				<div class="form-group">
					<label for="keywords">Palabras claves</label>
					<input type="text" class="form-control" name="keywords" id="keywords" placeholder="Palabras claves">
				</div>
				<div class="form-group">
					<label for="format">Formato</label>
					<input type="text" class="form-control" name="format" id="format" placeholder="Formato">
				</div>
				<div class="form-group">
					<label for="entities">Entidades</label>
					<input type="text" class="form-control" name="entities" id="entities" placeholder="Entidades">
				</div>
				<div class="form-group">
					<label for="created_at">Fecha de creación</label>
					<input type="date" class="form-control" name="created_at" id="created_at" placeholder="Fecha de creación">
				</div>
				<div class="form-group">
					<label for="cost">Costo</label>
					<input type="text" class="form-control" name="cost" id="cost" placeholder="Costo">
				</div>
				<div class="form-group">
					<label for="rights">Derechos</label>
					<input type="text" class="form-control" name="rights" id="rights" placeholder="Derechos">
				</div>
				<div class="form-group">
                    <label for="is_active">Activo</label>
                    <select class="form-control" name="is_active" id="is_active">
                        <option value="0">No</option>
                        <option value="1" selected>Si</option>
                    </select>
                </div>
				<button type="submit" class="btn btn-primary btn-block">Crear</button>
			<?= form_close(); ?>

		</div>

	</div>

</div>
<!-- /.container-fluid -->
