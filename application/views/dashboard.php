<?php

$value = get_object_vars($a[0]);

$tl = $value["COUNT(*)"]; 

$value = get_object_vars($b[0]);

$ttdg = $value["COUNT(*)"]; 

$value = get_object_vars($c[0]);

$tlpa = $value["COUNT(*)"]; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<script type="text/javascript">
		var base = '<?php echo base_url(); ?>';
	</script>
	<style type="text/css">
		.customdlwpdfbtn{
			font-size: 13px !important;
			width: 100% !important;
			text-align: center !important;
			margin: 0 !important;
			padding: 2px !important;
			line-height: 25px !important;
			color: white !important;
		}
	</style>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Biblioteca Virtual Admin</title>
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="css/sb-admin-2.css" rel="stylesheet">
	<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top" class="sidebar-toggled">
	<div id="wrapper">
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" style="width: auto !important; background-image: linear-gradient(180deg, #5e2129 10%, #1e1e1e 100%);">
			<li class="nav-item active">
				<a class="nav-link" href="dashboard">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Inicio</span>
				</a>
			</li>

			<hr class="sidebar-divider my-0">

			<li class="nav-item">
				<a class="nav-link" href="ver_libros">
					<i class="fas fa-fw fa-book"></i>
					<span>Ver Libros</span>
				</a>
			</li>

			<hr class="sidebar-divider my-0">

			<li class="nav-item">
				<a class="nav-link" href="ver_tdg">
					<i class="fas fa-fw fa-graduation-cap"></i>
					<span>Ver Trabajos de Grado</span>
				</a>
			</li>

			<hr class="sidebar-divider my-0">

			<li class="nav-item">
				<a class="nav-link" href="cargar_libro_adm">
					<i class="fas fa-fw fa-upload"></i>
					<span>Cargar Libro</span>
				</a>
			</li>

			<hr class="sidebar-divider my-0">

			<li class="nav-item">
				<a class="nav-link" href="cargar_tdg_adm">
					<i class="fas fa-fw fa-upload"></i>
					<span>Cargar Trabajo de Grado</span>
				</a>
			</li>

			<hr class="sidebar-divider my-0">

			<li class="nav-item">
				<a class="nav-link" href="cerrar_ses_adm">
					<i class="fas fa-fw fa-sign-out-alt"></i>
					<span>Cerrar Sesión</span>
				</a>
			</li>

			<hr class="sidebar-divider">
		</ul>

		<div id="content-wrapper" class="d-flex flex-column">

			<div id="content">

				<div class="container-fluid" style="padding-top: 1.5rem;">

					<h1 class="h3 mb-2 text-gray-800">Inicio</h1>

					<div class="card shadow mb-4">
						<div class="card-body">
							<div class="row">

								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-primary shadow h-100 py-2">
										<div class="card-body">
											<div class="row no-gutters align-items-center">
												<div class="col mr-2">
													<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Libros</div>
													<div class="row no-gutters align-items-center">
														<div class="col-auto">
															<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $tl; ?></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-success shadow h-100 py-2">
										<div class="card-body">
											<div class="row no-gutters align-items-center">
												<div class="col mr-2">
													<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Trabajos de Grado</div>
													<div class="row no-gutters align-items-center">
														<div class="col-auto">
															<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $ttdg; ?></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-info shadow h-100 py-2">
										<div class="card-body">
											<div class="row no-gutters align-items-center">
												<div class="col mr-2">
													<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Libros Por Aprobar</div>
													<div class="row no-gutters align-items-center">
														<div class="col-auto">
															<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $tlpa; ?></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>


								<!-- <div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-warning shadow h-100 py-2">
										<div class="card-body">
											<div class="row no-gutters align-items-center">
												<div class="col mr-2">
													<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Buscar Libros</div>
													<div class="row no-gutters align-items-center">
														<div class="col-auto">
															<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div> -->

							</div>
						</div>
					</div>
				</div>
			</div>

			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span><p> &copy; 2019 Universidad Alejandro de Humboldt | Desarrollado por <em> Renzo Zue y Khristofer Ramirez</em></p></span>
					</div>
				</div>
			</footer>

		</div>
	</div>

	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin-2.min.js"></script>
</body>
</html>
