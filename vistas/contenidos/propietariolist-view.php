<!-- Content page-Descripcion del formulario -->
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Propietario/Poseedor</h1>
	</div>
	<p class="lead" align="justify">Este modulo del sistema permitirá el registro, busqueda, modificación y eliminación de los 
	propietarios o poseedores de objetos y vehiculos, asignándoles  un rol o perfil (Aprendiz - Funcionario - Visitante).</p>
</div>

<!-- Anclas para cambiar las paginas (registrar,listar,buscar). -->
<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>propietario/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PROPIETARIO/POSEEDOR
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>propietariolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTADO DE PROPIETARIO/POSEEDOR
	  		</a>
	  	</li>
		  <li>
	  		<a href="<?php echo SERVERURL; ?>propietariosearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR PROPIETARIO/POSEEDOR
	  		</a>
	  	</li>
	</ul>
</div>

<!-- Panel listado de propietarios  -->
<?php require_once "./controladores/propietarioControlador.php";
      $ins = new propietarioControlador(); 
?>
<!-- Panel listado de categorias -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PROPIETARIOS</h3>
		</div>
		<div class="panel-body">
		
			<?php 
			    $pagina = explode("/", $_GET['views']);
			    echo $ins->cargar_paginador_propietario($pagina[1],5);
			?>
			
		</div>
	</div>
</div>