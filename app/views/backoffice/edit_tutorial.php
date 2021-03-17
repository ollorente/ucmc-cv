<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Editar tutorial</h1>
			<a href="<?= base_url('backoffice/tutorial/') . $tutorial->_id ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

			<?= '<span class="text-danger font-weight-bold">'. validation_errors() .'</span>' ?>
			<?= isset( $updated ) ? $updated : '' ?>
			<?= form_open(); ?>
				<div class="form-group">
					<label for="name">Título de la herramienta *</label>
					<input type="text" class="form-control" name="name" value="<?= $tutorial->tutorialTitle ?>" id="name" placeholder="Título de la herramienta *" required autofocus>
				</div>
				<div class="form-group">
					<label for="url">Slug de la herramienta *</label>
					<input type="text" class="form-control" name="slug" value="<?= $tutorial->tutorialSlug ?>" id="slug" placeholder="Slug de la herramienta *" required>
				</div>
				<div class="form-group">
					<label for="url">Link de la herramienta *</label>
					<input type="text" class="form-control" name="url" value="<?= $tutorial->tutorialLink ?>" id="url" placeholder="Link de la herramienta *" required>
				</div>
				<div class="form-group">
					<label for="url">Link de imagen</label>
					<input type="text" class="form-control" name="urlImg" value="<?= $tutorial->tutorialImage ?>" id="urlImg" placeholder="Link de imagen">
				</div>
				<div class="form-group">
					<label for="role">A quién va dirigido *</label>
					<select class="form-control" name="role" value="<?= $tutorial->tutorialRole ?>" id="role" required>
						<?php foreach ($roles as $item) { ?>
						<option value="<?= $item['_id'] ?>" <?php if ($item['_id'] == $tutorial->tutorialRole) { echo 'selected'; } ?>><?= $item['roleName'] ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
                    <label for="is_active">Activo</label>
                    <select class="form-control" name="is_active" id="is_active">
                        <option value="0" <?php if ($tutorial->isTutorialActive == '0') { echo 'selected'; } ?>>No</option>
                        <option value="1" <?php if ($tutorial->isTutorialActive == '1') { echo 'selected'; } ?>>Si</option>
                    </select>
                </div>
				<div class="form-group">
                    <label for="is_lock">Bloqueado</label>
                    <select class="form-control" name="is_lock" id="is_lock">
                        <option value="0" <?php if ($tutorial->isTutorialLock == '0') { echo 'selected'; } ?>>No</option>
                        <option value="1" <?php if ($tutorial->isTutorialLock == '1') { echo 'selected'; } ?>>Si</option>
                    </select>
                </div>
				<button type="submit" class="btn btn-warning btn-block">Actualizar</button>
			<?= form_close(); ?>

		</div>

	</div>

</div>
<!-- /.container-fluid -->
