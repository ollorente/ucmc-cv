<!-- Begin Page Content -->
<div class="container-fluid" id="main">

<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Editar herramienta <b><?= $tool->_id ?></b></h1>
			<a href="<?= base_url('backoffice/herramienta/') . $tool->_id ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

			<?= '<span class="text-danger font-weight-bold">'. validation_errors() .'</span>' ?>
			<?= isset( $updated ) ? $updated : '' ?>
			<?= form_open(); ?>
				<div class="form-group">
					<label for="name">Título de la herramienta *</label>
					<input type="text" class="form-control" name="name" value="<?= $tool->toolName ?>" id="name" placeholder="Título de la herramienta *" required autofocus>
				</div>
				<div class="form-group">
					<label for="url">Link de la herramienta *</label>
					<input type="text" class="form-control" name="url" value="<?= $tool->toolNameUrl ?>" id="url" placeholder="Link de la herramienta *" required>
				</div>
				<div class="form-group">
					<label for="description">Descripción</label>
					<textarea class="form-control" name="description" id="description" rows="5" placeholder="Descripción" maxlength="255"><?= $tool->toolDescription ?></textarea>
				</div>
				<div class="form-group">
					<label for="url">Link de imagen</label>
					<input type="text" class="form-control" name="urlImg" value="<?= $tool->toolImageUrl ?>" id="url" placeholder="Link de imagen">
				</div>
				<div class="form-group">
					<label for="role">A quién va dirigido *</label>
					<select class="form-control" name="role" value="<?= $tool->toolRole ?>" id="role" required>
						<?php foreach ($roles as $item) { ?>
						<option value="<?= $item['_id'] ?>" <?php if ($item['_id'] == $tool->toolRole) { echo 'selected'; } ?>><?= $item['roleName'] ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
                    <label for="is_active">Activo</label>
                    <select class="form-control" name="is_active" id="is_active">
                        <option value="0" <?php if ($tool->isToolActive == '0') { echo 'selected'; } ?>>No</option>
                        <option value="1" <?php if ($tool->isToolActive == '1') { echo 'selected'; } ?>>Si</option>
                    </select>
                </div>
				<button type="submit" class="btn btn-warning btn-block">Actualizar</button>
			<?= form_close(); ?>

		</div>

	</div>

</div>
<!-- /.container-fluid -->
