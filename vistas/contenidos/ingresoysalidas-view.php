<!-- Content page -->
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-swap"></i> Ingresos-Salidas</h1>
	</div>
	<p class="lead" text="justify">Esta funcionalidad del sistema le permite resgitrar,actualizar,buscar y eliminar los ingresos y salidas que se presenten en el centro de formación.</p>
</div>

<!-- Panel nuevo administrador -->
<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO INGRESO/SALIDA</h3>
		</div>
		<div class="panel-body">
			<form>
		    	<fieldset>
		    		<legend>
		    			<i class="zmdi zmdi-info"></i> &nbsp; Ingrese la información solicitada!
		    		</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12">
						    	<div class="form-group label-floating">
								  	<label class="control-label ">No. Documeto - Placa </label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="DOC"  maxlength="50">
								</div>
		    				</div>
	    				</div>
		    		</div>
		    		<div class="panel-body">
						<div class="table-responsive table-bordered">
							<table class="table table-hover text-center">
								<thead>
									<tr style="background-color:#009688;">		
										<th class="text-center">Descripción</th>
										<th class="text-center">Seleccionar</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Portatil</td>
										<td><input type="checkbox" name="ingresar_check"></td>
									</tr>
								</tbody>
							</table>
						</div>		
					</div>
		    	</fieldset>
		    	<br>
		    	<!--Tabla de objetos -->
		    	<fieldset>
		    		<legend>
		    			<i class="zmdi zmdi-info"></i> &nbsp; Objetos
		    		</legend>
		    		<div class="container-fluid">
		    		</div>
		    		<div class="panel-body">
						<div class="table-responsive table-bordered">
							<table class="table table-hover text-center">
								<thead>
									<tr style="background-color:#009688;">		
									 	<th class="text-center">Item</th>
					                    <th class="text-center">Codigo I/S</th>
					                    <th class="text-center">Codigo Obj</th>
					                    <th class="text-center">Tipo Elemento</th>
					                    <th class="text-center">Cantidad</th>
					                    <th class="text-center">Tipo Actividad</th>
					                    <th class="text-center">Fecha-Hora</th>
					                    <th class="text-center">Observación</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center">1</td>
					                    <td class="text-center">001</td>
					                    <td class="text-center">341</td>
					                    <td class="text-center">Tecnologico</td>
					                    <td class="text-center">1</td>
					                    <td class="text-center">Entrada</td>
					                    <td class="text-center">24-02-2020 07:40:60</td>
					                    <td class="text-center">ninguna</td>
									</tr>
								</tbody>
							</table>
						</div>		
					</div>
		    	</fieldset>
		    	<br>
		    	<!--Tabla de vehiculos -->
		    	<fieldset>
		    		<legend>
		    			<i class="zmdi zmdi-info"></i> &nbsp; Vehiculos
		    		</legend>
		    		<div class="container-fluid">
		    		</div>
		    		<div class="panel-body">
						<div class="table-responsive table-bordered">
							<table class="table table-hover text-center">
								<thead>
									<tr style="background-color:#009688;">		
									 	<th class="text-center">Item</th>
					                    <th class="text-center">Codigo I/S</th>
					                    <th class="text-center">Codigo Veh</th>
					                    <th class="text-center">Tipo Vehiculo</th>
					                    <th class="text-center">Posicion</th>
					                    <th class="text-center">Tipo Actividad</th>
					                    <th class="text-center">Fecha-Hora</th>
					                    <th class="text-center">Observación</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center">1561</td>
					                    <td class="text-center">0141</td>
					                    <td class="text-center">TMH-590</td>
					                    <td class="text-center">Automovil</td>
					                    <td class="text-center">22</td>
					                    <td class="text-center">Entrada</td>
					                    <td class="text-center">24-02-2020 10:40:60</td>
					                    <td class="text-center">ninguna</td>
									</tr>
								</tbody>
							</table>
						</div>		
					</div>
		    	</fieldset>
		    	<br>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
			    	<button type="submit" class="btn btn-warning btn-raised btn-sm"><i class="zmdi zmdi-file-text zmdi-hc-fw"></i> Novedad</button>
			    </p>
		    </form>
		</div>
	</div>
</div>