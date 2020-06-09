<!-- información sobre reportes -->
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-assignment-check"></i> Reportes</h1>
	</div>
	<p class="lead" text="justify">Esta funcionalidad del sistema, le permite generar reportes según los parametros establecidos en el formulario presente.</p>
</div>

<!-- Panel para generar el reporte -->
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-body">
			<form>
		    	<fieldset>
		    		<legend>
		    			<i class="zmdi zmdi-info"></i> &nbsp; Determine las fechas y demás parametros para generar el reporte requerido!
		    		</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12">
						    	<div class="form-group label-floating">
								  	<label class="control-label">No. Documeto - Placa </label>
								  	<input pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{5,50}" class="form-control" type="text" name="nombre-reg"  maxlength="50">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Desde</label>
								  	<input class="form-control" type="datetime" name="desde" value="<?php echo date("Y-m-d");?>">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Hasta</label>
								  	<input class="form-control" type="datetime" name="hasta" value="<?php echo date("Y-m-d");?>">
								</div>
		    				</div>
	    				</div>
		    		</div>
		    	</fieldset>
		    	<br>
		    	<fieldset>
				    		<legend>
				    			<i class="zmdi zmdi-info"></i> &nbsp; Reporte del día!
				    		</legend>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 ">
								    	<label class="form-check-label lbl" for="checkMain">
								    		<input class="form-check-input lbl" type="checkbox"  id="checkMain">	Seleccionar todo
								    	</label>
				    				</div>
				    				<div class="col-xs-12 ">
								    	<label class="form-check-label lbl checkAll" for="checkOI">
								    		<input class="form-check-input case" name="case[]" value="1" type="checkbox"  id="checkOI">	Objetos Ingresados
								    	</label>
				    				</div>
				    				<div class="col-xs-12 ">
								    	 <label class="form-check-label lbl checkAll " for="checkOS">
								    	 	<input class="form-check-input case" name="case[]" value="2" type="checkbox"  id="checkOS">	Objetos Salieron
								    	 </label>
				    				</div>
				    				<div class="col-xs-12 ">
								    	<label class="form-check-label lbl checkAll" for="checkVI">
								    		<input class="form-check-input case" name="case[]" value="3" type="checkbox"  id="checkVI">	Vehiculos Ingresados
								    	</label>
				    				</div>
				    				<div class="col-xs-12 ">
								    	 <label class="form-check-label lbl checkAll" for="checkVS">
								    	 	<input class="form-check-input case" name="case[]" value="4" type="checkbox"  id="checkVS">	Vehiculos Salieron</label>
				    				</div>
			    				</div>
				    		</div>
				    	</fieldset>
		    	<br>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Descargar</button>
			    </p>
		    </form>
		</div>
	</div>
</div>
	