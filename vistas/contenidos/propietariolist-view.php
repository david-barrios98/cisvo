<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Propietario/Poseedor<small> PERSONAS</small></h1>
	</div>
	<p class="lead">Este modulo del sistema permitirá el registro, busqueda, modificación y eliminación de los 
	propietarios o poseedores de objetos y vehiculos, asignándoles  un rol o perfil (Aprendiz - Funcionario - Instructor - Visitante).</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>propietario/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PROPIETARIO/POSEEDOR
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>propietariolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PROPIETARIO/POSEEDOR
	  		</a>
	  	</li>
		  <li>
	  		<a href="<?php echo SERVERURL; ?>propietariosearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR PROPIETARIO
	  		</a>
	  	</li>
	</ul>
</div>

<!-- Panel listado de categorias -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CATEORÍAS</h3>
		</div>
		<div class="panel-body">
		<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th class="text-center">ID</th>
							<th class="text-center">NOMBRE</th>
							<th class="text-center">APELLIDO</th>
							<th class="text-center">FECHA NACIMIENTO</th>
							<th class="text-center">DIRECCION</th>
							<th class="text-center">MUNICIPIO</th>
							<th class="text-center">CORREO</th>
							<th class="text-center">CELULAR</th>
							<th class="text-center">EDITAR</th>
							<th class="text-center">ELIMINAR</th>
						</tr>
					</thead>
					<tbody>
						<tr>
                            <td>11232145</td>
							<td>Juan</td>
							<td>Paternina</td>
							<td>10/2/1972</td>
							<td>cll 30 b 2-4</td>
                            <td>Soledad</td>
							<td>j@gmail.com</td>
							<td>30000033</td>
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