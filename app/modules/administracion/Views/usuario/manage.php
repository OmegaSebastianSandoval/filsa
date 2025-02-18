<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform; ?>" id="form-users" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->user_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->user_id; ?>" />
			<?php } ?>
			<div class="row">
				<div class="col-12 col-md-3 form-group">
					<label class="control-label">Estado</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul-claro "><i class="fas fa-clipboard-check"></i></span>
						</div>
						<select class="form-control" name="user_state" id="user_state" required>
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_user_state as $key => $value) { ?>
								<option <?php if ($this->getObjectVariable($this->content, "user_state") == $key) {
													echo "selected";
												} ?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 col-md-3 form-group">
					<label class="control-label">Tipo de Usuario</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro "><i class="far fa-list-alt"></i></span>
						</div>

						<select class="form-control" name="user_level" id="user_level" required>
							<option value=""
								<?php if ($this->content->user_level == 2) {
									echo "disabled";
								} ?>>Seleccione...</option>
							<?php foreach ($this->list_user_level as $key => $value) { ?>
								<option
									<?php if ($this->getObjectVariable($this->content, "user_level") == $key) {
										echo "selected";
									} ?>
									<?php if ($this->content->user_level == 2 && $this->getObjectVariable($this->content, "user_level") != $key) {
										echo "disabled";
									} ?>
									value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>



					</label>
					<div class="help-block with-errors"></div>
				</div>

				<div class="col-12 col-md-3 form-group cliente">
					<label class="control-label">Nivel del Cliente</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro "><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control requerido-cliente" name="user_nivel_cliente" id="user_nivel_cliente">
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_user_nivel_cliente as $key => $value) { ?>
								<option <?php if ($this->getObjectVariable($this->content, "user_nivel_cliente") == $key) {
													echo "selected";
												} ?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<input type="hidden" name="user_date" value="<?php echo $this->content->user_date ?>">
				<div class="col-12 col-md-3 form-group no-cliente">
					<label for="user_names" class="control-label">Nombres</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->user_names; ?>" name="user_names" id="user_names" class="form-control requerido-usuario" required>
					</label>
					<div class="help-block with-errors"></div>
				</div>

				<div class="col-12 col-md-3 form-group cliente">
					<label for="user_empresa" class="control-label">Nombre del Cliente</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->user_empresa; ?>" name="user_empresa" id="user_empresa" class="form-control requerido-cliente" required>
					</label>
					<div class="help-block with-errors"></div>
				</div>

				<div class="col-12 col-md-3 form-group">
					<label for="user_cedula" id="label-nit" class="control-label">Cédula</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->user_cedula; ?>" name="user_cedula" id="user_cedula" onkeypress="return soloNumerosYGuion(event)" data-remote="/core/user/validationcedula?csrf=1&cedula=<?= $this->content->user_cedula; ?>" class="form-control" required>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 col-md-3 form-group no-cliente ">
					<label for="user_user" class="control-label">Usuario</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rosado "><i class="fas fa-user-tie"></i></span>
						</div>
						<input type="text" value="<?= $this->content->user_user; ?>" name="user_user" id="user_user" class="form-control requerido-usuario" required data-remote="/core/user/validation?csrf=1&user=<?= $this->content->user_user; ?>">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 col-md-3 form-group">
					<label for="user_email" id="label-correo" class="control-label">correo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro "><i class="fas fa-envelope"></i></span>
						</div>
						<input type="email" value="<?= $this->content->user_email; ?>" name="user_email" id="user_email" class="form-control" required data-remote="/core/user/validationemail?csrf=1&email=<?= $this->content->user_email; ?>">
					</label>
					<div class="help-block with-errors"></div>
				</div>

				<div class="col-12 col-md-3 form-group">
					<label for="user_telefono" id="label-telefono" class="control-label">Teléfono</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->user_telefono; ?>" name="user_telefono" id="user_telefono" class="form-control" onkeypress="return soloNumeros(event)" maxlength="10" minlength="10" pattern="^\d+$" required>
					</label>
					<div class="help-block with-errors"></div>
				</div>


				<div class="col-12 col-md-3 form-group no-cliente">
					<label for="user_password" class="control-label">Contrase&ntilde;a</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-cafe "><i class="fas fa-key"></i></span>
						</div>
						<input type="password" value="" name="user_password" id="user_password" class="form-control  requerido-usuario" <?php if (!$this->content->user_id) { ?>required <?php } ?> data-remote="/core/user/validarclave">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 col-md-3 form-group no-cliente">
					<label for="user_password" class="control-label">Repita Contrase&ntilde;a</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-cafe "><i class="fas fa-key"></i></span>
						</div>
						<input type="password" value="" name="user_passwordr" id="user_passwordr" data-match="#user_password" min="8" data-match-error="Las dos contraseñas no son iguales" class="form-control   requerido-usuario" <?php if (!$this->content->user_id) { ?>required <?php } ?>>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 col-md-3 form-group cliente">
					<label for="user_departamento" class="control-label">Departamento</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado "><i class="fas fa-pencil-alt"></i></span>
						</div>

						<select name="user_departamento" id="user_departamento" class="form-control requerido-cliente">
							<option value="" selected disabled>Seleccione un departamento</option>
							<?php foreach ($this->departamentos as $departamento) { ?>
								<option <?= $this->content->user_departamento === $departamento->id_departamento ? 'selected' : '' ?> value="<?= $departamento->id_departamento ?>"><?= $departamento->departamento ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 col-md-3 form-group cliente">
					<label for="user_municipio" class="control-label">Municipio</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado "><i class="fas fa-pencil-alt"></i></span>
						</div>

						<select name="user_municipio" id="user_municipio" class="form-control requerido-cliente">
							<option value="" selected disabled>Seleccione un municipio</option>
						</select>

					</label>
					<div class="help-block with-errors"></div>
				</div>

				<div class="col-12 col-md-3 form-group cliente">
					<label for="user_addres" class="control-label">Dirección</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->user_addres; ?>" name="user_addres" id="user_addres" class="form-control requerido-cliente">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 col-md-3 form-group cliente">
					<label for="user_contacto" class="control-label">Nombre de Contacto</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->user_contacto; ?>" name="user_contacto" id="user_contacto" class="form-control requerido-cliente">
					</label>
					<div class="help-block with-errors"></div>
				</div>

				<div class="col-12 col-md-3 form-group cliente">
					<label for="user_telefono_contacto" class="control-label">Teléfono del Contacto</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->user_telefono_contacto; ?>" name="user_telefono_contacto" onkeypress="return soloNumeros(event)" maxlength="10" minlength="10" pattern="^\d+$" id="user_telefono_contacto" class="form-control requerido-cliente" required>
					</label>
					<div class="help-block with-errors"></div>
				</div>

				<input type="hidden" name="user_delete" value="<?php echo $this->content->user_delete ?>">
				<input type="hidden" name="user_current_user" value="<?php echo $this->content->user_current_user ?>">
				<input type="hidden" name="user_code" value="<?php echo $this->content->user_code ?>">
			</div>
		</div>
		<div class="botones-acciones">
			<button class="btn btn-guardar" id="btn-form-users" type="submit">Guardar</button>
			<a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>
<style>
	.cliente {
		display: none;
	}
</style>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		cambiarNivel()

		function cambiarNivel() {
			const nivel = document.getElementById('user_level');

			const labelNit = document.getElementById('label-nit');
			const labelCorreo = document.getElementById('label-correo');
			const labelTelefono = document.getElementById('label-telefono');
			console.log(nivel.value);
			if (nivel.value == 2) {
				$('.cliente').show();
				$('.no-cliente').hide();
				$('.requerido-cliente').prop('required', true);
				$('.requerido-usuario').prop('required', false);

				labelNit.innerHTML = 'Nit';
				labelCorreo.innerHTML = 'Correo del Cliente';
				labelTelefono.innerHTML = 'Teléfono del Cliente';
			} else {
				$('.cliente').hide();
				$('.no-cliente').show();
				$('.requerido-cliente').prop('required', false);
				$('.requerido-usuario').prop('required', true);

				labelNit.innerHTML = 'Cédula';
				labelCorreo.innerHTML = 'Correo';
				labelTelefono.innerHTML = 'Teléfono';

			}
		}
		document.getElementById('user_level').addEventListener('change', cambiarNivel);

		document.getElementById('form-users').addEventListener('submit', function(event) {
			const buttonUser = document.getElementById('btn-form-users');
			buttonUser.disabled = true;
		});
	});

	function soloNumeros(event) {
		const charCode = event.keyCode ? event.keyCode : event.which;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			event.preventDefault();
			return false;
		}
		return true;
	}

	function soloNumerosYGuion(event) {
		const charCode = event.keyCode ? event.keyCode : event.which;

		// Permitir números (0-9) y el guion (-)
		if (
			charCode !== 45 && // Código ASCII del guion "-"
			(charCode < 48 || charCode > 57) // Números (0-9)
		) {
			event.preventDefault();
			return false;
		}

		return true;
	}

	// Obtenemos los elementos select del DOM
	const selectDepartamento = document.getElementById('user_departamento');
	const selectMunicipio = document.getElementById('user_municipio');

	// Obtenemos los municipios desde PHP y los pasamos a JavaScript
	const municipios = [
		<?php foreach ($this->municipios as $municipio) { ?> {
				id: '<?= $municipio->id_municipio ?>',
				nombre: '<?= $municipio->municipio ?>',
				departamentoId: '<?= $municipio->departamento_id ?>'
			},
		<?php } ?>
	];

	function actualizarMunicipios(departamentoId, municipioId = '') {
		// Limpiamos las opciones actuales del select de municipios
		selectMunicipio.innerHTML = '<option value="" selected disabled>Seleccione un municipio</option>';

		// Filtramos los municipios que pertenecen al departamento seleccionado
		const municipiosFiltrados = municipios.filter(
			municipio => municipio.departamentoId === departamentoId
		);

		// Agregamos las opciones filtradas al select de municipios
		municipiosFiltrados.forEach(municipio => {
			const option = document.createElement('option');
			option.value = municipio.id;
			option.textContent = municipio.nombre;

			// Si el municipio coincide con el seleccionado, lo seleccionamos
			if (municipio.id === municipioId) {
				option.selected = true;
			}

			selectMunicipio.appendChild(option);
		});
	}

	// Evento para actualizar los municipios al cambiar el departamento
	selectDepartamento.addEventListener('change', function() {
		const departamentoId = this.value;
		actualizarMunicipios(departamentoId);
	});

	if (selectDepartamento.value) {
		actualizarMunicipios(selectDepartamento.value, '<?= $this->content->user_municipio ?>');
	}
</script>