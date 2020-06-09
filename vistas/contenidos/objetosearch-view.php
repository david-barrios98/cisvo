<!-- Content page-Descripcion del formulario -->
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-folder"></i> Objetos </h1>
	</div>
	<p class="lead" align="justify">
		Esta funcionalidad del sistema, le permite añadir, actualizar, eliminar y consultar, información de los objetos que ingresan y salen del centro de formación!
	</p>
</div>

<!-- Anclas para cambiar las paginas (registrar,listar,buscar). -->
<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>objeto/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO OBJETO
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>objetolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTADO DE OBJETOS
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>objetosearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR OBJETOS
	  		</a>
	  	</li>
	</ul>
</div>

<!-- ZONA DE BUSQUEDA DEL FORMULARIO-->
<div class="container-fluid">
	<form class="well">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2">
				<div class="form-group label-floating">
					<span class="control-label">¿Qué objeto estas buscando?</span>
					<input pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{5,50}"class="form-control" type="text" name="objeto-busqueda" required="" maxlength="50">
				</div>
			</div>
			<div class="col-xs-12">
				<p class="text-center">
					<button type="submit" class="btn btn-primary btn-raised btn-sm"><i class="zmdi zmdi-search"></i> &nbsp; Buscar</button>
				</p>
			</div>
		</div>
	</form>
</div>

<div class="container-fluid">
	<form class="well">
		<p class="lead text-center">Su última búsqueda  fue <strong>“Busqueda”</strong></p>
		<div class="row">
			<input class="form-control" type="hidden" name="search_client_destroy" required="">
			<div class="col-xs-12">
				<p class="text-center">
					<button type="submit" class="btn btn-danger btn-raised btn-sm"><i class="zmdi zmdi-delete"></i> &nbsp; Eliminar búsqueda</button>
				</p>
			</div>
		</div>
	</form>
</div>

<!-- Resultado de la búsqueda-->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE OBJETOS</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">CÓDIGO</th>
							<th class="text-center">NOMBRE</th>
							<th class="text-center">MARCA</th>
							<th class="text-center">MODELO</th>
                            <th class="text-center">TIPO</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>700</td>
							<td>TV</td>
                            <td>LG</td>
                            <td>ELECTRODOMESTIOCO</td>
							<td>
								<a href="#!" class="btn btn-success btn-raised btn-xs">
									<i class="zmdi zmdi-refresh"></i>
								</a>
							</td>
							<td>
								<form>
									<button type="submit" class="btn btn-danger btn-raised btn-xs">
										<i class="zmdi zmdi-delete"></i>
									</button>
								</form>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<nav class="text-center">
				<ul class="pagination pagination-sm">
					<li class="disabled"><a href="javascript:void(0)">«</a></li>
					<li class="active"><a href="javascript:void(0)">1</a></li>
					<li><a href="javascript:void(0)">2</a></li>
					<li><a href="javascript:void(0)">3</a></li>
					<li><a href="javascript:void(0)">4</a></li>
					<li><a href="javascript:void(0)">5</a></li>
					<li><a href="javascript:void(0)">»</a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>