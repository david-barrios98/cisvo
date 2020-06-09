<div class="container-fluid">
<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-file-text zmdi-hc-fw"></i> Solicitudes<small> PERSONAS</small></h1>
	</div>
	<p class="lead">Este modulo del sistema permitirá el registro y busqueda de solicitudes, peticiones y quejas referentes a todo suceso que se presente en el estacionamiento. </p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>solicitudes/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA SOLICITUD
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>solicitudeslist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTADO DE SOLICITUDES
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>solicitudsearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR SOLICITUD
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
					<span class="control-label">¿Qué solicitud estas buscando?</span>
					<input pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{5,70}" class="form-control" type="text" name="solicitud-busqueda" required="" maxlength="70">
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
<!-- Panel listado de busqueda de vehiculos- RESULTADO DE LA BÚSQUEDA -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTADO DE SOLICITUDES</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th class="text-center">CODIGO</th>
							<th class="text-center">TIPO</th>
							<th class="text-center">DESCRIPCION</th>
							<th class="text-center">FECHA</th>
							<th class="text-center">ESTADO</th>
							<th class="text-center">ID PERSONA</th>
							<th class="text-center">OBJ/VEH</th>
							<th class="text-center">USUARIO</th>
							<th class="text-center">EDITAR</th>
							<th class="text-center">ELIMINAR</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Juan</td>
							<td>WPK-22D</td>
							<td>Bajaj</td>
							<td>Pulsar 150ns</td>
							<td>Juan</td>
							<td>WPK-22D</td>
							<td>Bajaj</td>
							<td>Pulsar 150ns</td>
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