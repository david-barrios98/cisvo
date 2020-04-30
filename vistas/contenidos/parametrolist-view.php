<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-collection-bookmark"></i> Parametros </h1>
	</div>
	<p class="lead" align="justify">
		Esta funcionalidad del sistema, le permite añadir, actualizar, eliminar y consultar, información de los parametros que seran vistos en todas las interfaces.
	</p>
</div>

<!-- Acciones a realizar (AÑADIR,LISTAR,BUSCAR)-->
<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>parametros/" class="btn btn-success">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PARAMETRO PRINCIPAL
	  		</a>
        </li>
        <li>
	  		<a href="<?php echo SERVERURL; ?>parametrolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA DESCRIPCION SEGUNDARIA
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
					<span class="control-label">¿A que paramatro primario va agregar?</span>
					<input class="form-control" type="text" name="search_client_init" required="">
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
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PARAMETRO</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">CÓDIGO</th>
							<th class="text-center">NOMBRE PRIMARIO</th>
							<th class="text-center">DESCRICIONES SEGUNDARIAS</th>
                            <th class="text-center">NUEVO</th>
                            <th class="text-center">EDITAR</th>
                            <th class="text-center">BORRAR</th>
						</tr>
					</thead>
					<tbody>
						<tr>
                            <td>1</td>
                            <td>34245</td>
							<td>ROL PROPIETARIO</td>
                            <td>APRENDIZ, FUNCIONARIO, VISITANTE</td>
                            <td>
								<form>
									<button type="submit" class="btn btn-info btn-raised btn-xs">
										<i class="zmdi zmdi-plus"></i>
									</button>
								</form>
							</td>
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
                        <tr>
                            <td>2</td>
                            <td>345245</td>
							<td>TIPO DE VEHICULO</td>
                            <td>MOTO, AUTOMOVIL, CAMIONETA, CAMION, CAMPERO</td>
                            <td>
								<form>
									<button type="submit" class="btn btn-info btn-raised btn-xs">
										<i class="zmdi zmdi-plus"></i>
									</button>
								</form>
							</td>
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