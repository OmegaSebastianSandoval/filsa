<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form action="<?php echo $this->route . "?documento_solucion=" . $this->documento_solucion . "" . "&documento_padre=" . $this->documento_padre . "" . "&documento_producto=" . $this->documento_producto . "" ?>" method="post">
		<div class="content-dashboard">
			<?php if ($this->documento_solucion) { ?>
				<div class="d-flex gap-4 mb-2">

					<?php if ($this->solucion->solucion_padre) { ?>

						<a href="/administracion/soluciones/?padre=<?= $this->solucion->solucion_padre ?>" class="btn btn-outline-success"><i class="fa-solid fa-circle-arrow-left"></i> Volver</a>
					<?php } else { ?>
						<a href="/administracion/soluciones/" class="btn btn-outline-success"><i class="fa-solid fa-circle-arrow-left"></i> Volver</a>
					<?php } ?>


					<?php if ($this->documento_padre) { ?>
						<div class="col-2">
							<a href="/administracion/documentos/?documento_solucion=<?= $this->documento_solucion ?>" class="btn btn-outline-primary px-2"><i class="fa-solid fa-circle-arrow-up"></i> Subir nivel </a>
						</div>


					<?php } ?>

				</div>
			<?php } ?>

			<?php if ($this->documento_producto) { ?>
				<div class="d-lfex mb-2  gap-4">


					<a href="/administracion/productos/" class="btn btn-outline-success "><i class="fa-solid fa-circle-arrow-left"></i> Volver</a>



					<?php if ($this->documento_padre) { ?>

						<a href="/administracion/documentos/?documento_producto=<?= $this->documento_producto ?>" class="btn btn-outline-primary  px-2"><i class="fa-solid fa-circle-arrow-up"></i> Subir nivel </a>



					<?php } ?>

				</div>
			<?php } ?>

			<div class="row">
				<div class="col-3">
					<label>Activo (Si, No)</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<!-- <input type="text" class="form-control" name="documento_estado" value="<?php echo $this->getObjectVariable($this->filters, 'documento_estado') ?>"></input> -->

						<select class="form-control" name="documento_estado">
							<option value="1" <?php if ($this->getObjectVariable($this->filters, 'documento_estado') == 1) {
													echo 'selected';
												} ?>>Si</option>
							<option value="0" <?php if ($this->getObjectVariable($this->filters, 'documento_estado') == 0) {
													echo 'selected';
												} ?>>No</option>
						</select>
					</label>
				</div>


				<div class="col-3">
					<label>Nombre</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" class="form-control" name="documento_nombre" value="<?php echo $this->getObjectVariable($this->filters, 'documento_nombre') ?>"></input>
					</label>
				</div>
				<!-- <div class="col-3">
					<label>documento</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" class="form-control" name="documento_documento" value="<?php echo $this->getObjectVariable($this->filters, 'documento_documento') ?>"></input>
					</label>
				</div> -->
				<div class="col-3">
					<label>&nbsp;</label>
					<button type="submit" class="btn btn-block btn-azul"> <i class="fas fa-filter"></i> Filtrar</button>
				</div>
				<div class="col-3">
					<label>&nbsp;</label>
					<a class="btn btn-block btn-azul-claro " href="<?php echo $this->route; ?>?cleanfilter=1"> <i class="fas fa-eraser"></i> Limpiar Filtro</a>
				</div>
			</div>
		</div>
	</form>
	<div align="center">
		<ul class="pagination justify-content-center">
			<?php
			$url = $this->route;
			if ($this->totalpages > 1) {
				if ($this->page != 1)
					echo '<li class="page-item" ><a class="page-link"  href="' . $url . '?page=' . ($this->page - 1) . '&documento_solucion=' . $this->documento_solucion . '&documento_padre=' . $this->documento_padre . '&documento_producto=' . $this->documento_producto . '"> &laquo; Anterior </a></li>';
				for ($i = 1; $i <= $this->totalpages; $i++) {
					if ($this->page == $i)
						echo '<li class="active page-item"><a class="page-link">' . $this->page . '</a></li>';
					else
						echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . $i . '&documento_solucion=' . $this->documento_solucion . '&documento_padre=' . $this->documento_padre . '&documento_producto=' . $this->documento_producto . '">' . $i . '</a></li>  ';
				}
				if ($this->page != $this->totalpages)
					echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page + 1) . '&documento_solucion=' . $this->documento_solucion . '&documento_padre=' . $this->documento_padre . '&documento_producto=' . $this->documento_producto . '">Siguiente &raquo;</a></li>';
			}
			?>
		</ul>
	</div>
	<div class="content-dashboard">
		<div class="franja-paginas">
			<div class="row">
				<div class="col-5">
					<div class="titulo-registro">Se encontraron <?php echo $this->register_number; ?> Registros</div>
				</div>
				<div class="col-3 text-end">
					<div class="texto-paginas">Registros por pagina:</div>
				</div>
				<div class="col-1">
					<select class="form-control form-control-sm selectpagination">
						<option value="20" <?php if ($this->pages == 20) {
												echo 'selected';
											} ?>>20</option>
						<option value="30" <?php if ($this->pages == 30) {
												echo 'selected';
											} ?>>30</option>
						<option value="50" <?php if ($this->pages == 50) {
												echo 'selected';
											} ?>>50</option>
						<option value="100" <?php if ($this->pages == 100) {
												echo 'selected';
											} ?>>100</option>
					</select>
				</div>
				<div class="col-3">
					<div class="text-end"><a class="btn btn-sm btn-success" href="<?php echo $this->route . "\manage" . "?documento_solucion=" . $this->documento_solucion . "" . "&documento_padre=" . $this->documento_padre . "" . "&documento_producto=" . $this->documento_producto . ""; ?>"> <i class="fas fa-plus-square"></i> Crear Nuevo</a></div>
				</div>
			</div>
		</div>
		<div class="content-table">
			<table class=" table table-striped  table-hover table-administrator text-left">
				<thead>
					<tr>
						<td>Activo (Si, No)</td>
						<td>nombre</td>
						<td>documento</td>
						<td width="100">Orden</td>
						<td width="150"></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($this->lists as $content) { ?>
						<?php $id =  $content->documento_id; ?>
						<tr>
							<td><?= $content->documento_estado == 1 ? 'Si' : 'No'; ?></td>
							<td><?= $content->documento_nombre; ?></td>
							<td><?= $content->documento_documento; ?></td>
							<td>
								<input type="hidden" id="<?= $id; ?>" value="<?= $content->orden; ?>"></input>
								<button class="up_table btn btn-primary btn-sm"><i class="fas fa-angle-up"></i></button>
								<button class="down_table btn btn-primary btn-sm"><i class="fas fa-angle-down"></i></button>
							</td>
							<td class="text-end">
								<div>
									<?php if (!$content->documento_documento && !$content->documento_padre) { ?>
										<a class="btn btn-verde btn-sm" href="<?php echo $this->route; ?>/?documento_solucion=<?= $this->documento_solucion ?>&documento_padre=<?= $id ?>&documento_producto=<?php echo $this->documento_producto?>" data-bs-toggle="tooltip" data-placement="top" title="Archivos"><i class="fa-solid fa-file"></i></a>

									<?php } ?>
									<a class="btn btn-azul btn-sm" href="<?php echo $this->route; ?>/manage?id=<?= $id ?>" data-bs-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-pen-alt"></i></a>
									<span data-bs-toggle="tooltip" data-placement="top" title="Eliminar"><a class="btn btn-rojo btn-sm" data-bs-toggle="modal" data-bs-target="#modal<?= $id ?>"><i class="fas fa-trash-alt"></i></a></span>
								</div>
								<!-- Modal -->
								<div class="modal fade text-left" id="modal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
												<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<div class="">¿Esta seguro de eliminar este registro?</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
												<a class="btn btn-danger" href="<?php echo $this->route; ?>/delete?id=<?= $id ?>&csrf=<?= $this->csrf; ?><?php echo '' . '&documento_solucion=' . $this->documento_solucion . '&documento_padre=' . $this->documento_padre; ?>">Eliminar</a>
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<input type="hidden" id="csrf" value="<?php echo $this->csrf ?>"><input type="hidden" id="order-route" value="<?php echo $this->route; ?>/order"><input type="hidden" id="page-route" value="<?php echo $this->route; ?>/changepage">
	</div>
	<div align="center">
		<ul class="pagination justify-content-center">
			<?php
			$url = $this->route;
			if ($this->totalpages > 1) {
				if ($this->page != 1)
					echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page - 1) . '&documento_solucion=' . $this->documento_solucion . '&documento_padre=' . $this->documento_padre . '"> &laquo; Anterior </a></li>';
				for ($i = 1; $i <= $this->totalpages; $i++) {
					if ($this->page == $i)
						echo '<li class="active page-item"><a class="page-link">' . $this->page . '</a></li>';
					else
						echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . $i . '&documento_solucion=' . $this->documento_solucion . '&documento_padre=' . $this->documento_padre . '">' . $i . '</a></li>  ';
				}
				if ($this->page != $this->totalpages)
					echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page + 1) . '&documento_solucion=' . $this->documento_solucion . '&documento_padre=' . $this->documento_padre . '">Siguiente &raquo;</a></li>';
			}
			?>
		</ul>
	</div>
</div>