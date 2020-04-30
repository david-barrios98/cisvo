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
<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; INFORMACION DEL NUEVO PARAMETRO</h3>
		</div>
		<div class="panel-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre principal *</label>
                            <input autocomplete="off" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="text" id="NOMBREOBJETO" name="NOMBREOBJETO" required="" maxlength="50">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Descripcion_1 *</label>
                            <input autocomplete="off" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="text" id="NOMBREOBJETO" name="NOMBREOBJETO" required="" maxlength="50">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>