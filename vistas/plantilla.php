<?php
	$peticionAjax=false;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo COMPANY; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo SERVERURL; ?>vistas/css/main.css">
	<link rel="Shortcut Icon" type="image/x-icon" href="<?php echo SERVERURL; ?>vistas/assets/img/logsena.png" />
	<?php include "./vistas/modulos/script.php"; ?>
</head>
<body>
	<?php  
		require_once "./controladores/vistasControlador.php";

		$vt = new vistasControlador();
		$vistasR=$vt->obtener_vistas_controlador();

		if($vistasR=="login" || $vistasR=="404"):
			if ($vistasR=="login") {
				require_once "./vistas/contenidos/login-view.php";
			}else{
				require_once "./vistas/contenidos/404-view.php";
			}
		else:
			session_start(['name'=>'S_CISVO']);
	?>
	<!-- SideBar -->
	<?php include "./vistas/modulos/navlateral.php"; ?>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">

		<!-- NavBar -->
		<?php include "./vistas/modulos/navbar.php"; ?>
		
		<!-- Content page -->
		<?php require_once $vistasR; ?>

	</section>
	<?php endif; ?>
</body>
	<!--===== Scripts -->
	<?php include "./vistas/modulos/script.php"; ?>
</html>