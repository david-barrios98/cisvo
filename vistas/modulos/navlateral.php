<section class="full-box cover dashboard-sideBar">
	<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
	<div class="full-box dashboard-sideBar-ct">
		<!--SideBar Title -->
		<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
			<img src="<?php echo SERVERURL; ?>vistas/assets/img/logsena.png" alt="LogoSena" width="50px">
			<?php echo COMPANY; ?> <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
		</div>
		<!-- SideBar User info -->
		<div class="full-box dashboard-sideBar-UserInfo">
			<figure class="full-box">
				<img src="<?php echo SERVERURL; ?>vistas/assets/avatars/Male1Avatar.png" alt="UserIcon">
				<figcaption class="text-center text-titles">User name</figcaption>
			</figure>
			<ul class="full-box list-unstyled text-center">
				<li>
					<a href="<?php echo SERVERURL; ?>mydata//" title="Mis datos">
						<i class="zmdi zmdi-account-circle"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo SERVERURL; ?>myaccount/" title="Mi cuenta">
						<i class="zmdi zmdi-settings"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo SERVERURL; ?>myaccount/" title="Ayuda">
						<i class="zmdi zmdi-help-outline"></i>
					</a>
				</li>
				<li>
					<a href="#" title="Salir del sistema" class="btn-exit-system">
						<i class="zmdi zmdi-power"></i>
					</a>
				</li>
			</ul>
		</div>
		<!-- SideBar Menu -->
		<ul class="list-unstyled full-box dashboard-sideBar-Menu">
			<li>
				<a href="<?php echo SERVERURL; ?>home/">
					<i class="zmdi zmdi-home zmdi-hc-fw"></i> Inicio
				</a>
			</li>
			<li>
				<a href="#!" class="btn-sideBar-SubMenu">
					<i class="zmdi zmdi zmdi-label-alt zmdi-hc-fw"></i> Gestionar<i class="zmdi zmdi-caret-down pull-right"></i>
				</a>
				<ul class="list-unstyled full-box">
					<li>
						<a href="<?php echo SERVERURL; ?>/usuario/"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Usuarios</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>/propietario/"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Propietario/Poseedor</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>/objeto/"><i class="zmdi zmdi-folder zmdi-hc-fw"></i> Objetos</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>vehiculo/vehiculo/"><i class="zmdi zmdi-directions-car zmdi-hc-fw"></i> Vehiculos</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="<?php echo SERVERURL; ?>ingresoysalidas/">
					<i class="zmdi zmdi-swap zmdi-hc-fw"></i> Ingresos y Salidas
				</a>
			</li>
			<li>
				<a href="<?php echo SERVERURL; ?>parqueadero/">
					<i class="zmdi zmdi-parking zmdi-hc-fw"></i> Parqueadero
				</a>
			</li>
			<li>
				<a href="<?php echo SERVERURL; ?>solicitudes/solicitudes/">
					<i class="zmdi zmdi-file-text zmdi-hc-fw"></i> Solicitudes
				</a>
			</li>
			<li>
				<a href="<?php echo SERVERURL; ?>reportes/">
					<i class="zmdi zmdi-trending-up zmdi-hc-fw"></i> Reportes
				</a>
			</li>
			<li>
				<a href="<?php echo SERVERURL; ?>parametros/">
					<i class="zmdi zmdi-collection-bookmark zmdi-hc-fw"></i> Parametros
				</a>
			</li>
		</ul>
	</div>
</section>