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
			<li class="nav-item">
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

			<li class="nav-item active">
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

					<h1 class="h3 mb-2 text-gray-800">Cargar Libro</h1>

					<div class="card shadow mb-4">
						<div class="card-body">
							<div class="panel-body">
								<form id="libroform" class="form-horizontal row-border" action="<?php echo base_url(); ?>subir_libro" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-md-2 control-label">Titulo</label>
										<div class="col-md-12">
											<input id="titulo" class="form-control" type="text" name="titulo" required autofocus>
											<span class="help-block"><small><small>Debe ser exactamente como lo muestra el libro</small></small></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Autor</label>
										<div class="col-md-12">
											<input id="autor" class="form-control" type="text" name="autor" required autofocus>
											<span class="help-block"><small><small>Debe ser exactamente como lo muestra el libro</small></small></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Editorial</label>
										<div class="col-md-12">
											<input id="editorial" class="form-control" type="text" name="editorial" required autofocus>
											<span class="help-block"><small><small>Debe ser exactamente como lo muestra el libro</small></small></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Publicación</label>
										<div class="col-md-12">
											<input id="publicacion" class="form-control" type="date" name="publicacion" required autofocus>
											<span class="help-block"><small><small>Debe ser exactamente como la muestra el libro</small></small></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Materia</label>
										<div class="col-md-12">
											<select class="form-control" id="materia" name="materia" required>
												<option value="" selected="selected">Seleccione la materia</option>
												<?php foreach ($materias as $key) { ?>
													<option value="<?php echo $key->cod_materia; ?>">
														<?php echo $key->materia; ?>
													</option>
												<?php } ?>
											</select>
											<span class="help-block">Seleccione la materia a la que pertenece el libro</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Archivo</label>
										<div class="col-md-12">
											<input class="form-control" type="file" name="archivo" required autofocus style="padding: 3px;">
											<span class="help-block"><small><small>Debe ser en formato PDF</small></small></span>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-2 control-label"></label>
										<div class="col-md-12">
											<div class="row">
												<div class="col-xs-6 col-sm-6 col-md-3">
													<a id="subir" class="btn btn-lg btn-primary btn-block btn-signin" style="cursor: pointer; line-height: 35px; color: white;">
														Cargar Libro
													</a>
													<button id="subirreal" type="submit" style="display: none;"> send </button>
												</div>
											</div>
										</div>
									</div>

								</form>
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

	<?php if(isset($_GET["msg"])) { ?>
	<div id="ModalMsg" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Atención!</h4>
				</div>
				<div class="modal-body">
					<p style="text-align: justify;"><?php echo $_GET["msg"]; ?> </p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">De Acuerdo!</button>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin-2.min.js"></script>
	<script type="text/javascript">
		var xhr = $.post();

		<?php if(isset($_GET["msg"])) { ?>
		$('#ModalMsg').modal();
		$('#ModalMsg').modal('show');
		<?php } ?>

		$("#subir").click(function(){

			$('input[type=text]').each(function(){
				str = $(this).val();
				str = str.replace(/ +(?= )/g,'');
				$(this).val( str.trim() );
			})

			var inid = '#titulo';

			if ($(inid).val().length < 3|| $(inid).val().length > 50) {
				alert('El titulo tiene una longitud erronea (debe estar entre 5 y 50 caracteres)');
				$(inid).focus();
				return false;
			}

			var inid = '#autor';

			if ($(inid).val().length < 3|| $(inid).val().length > 50) {
				alert('El autor tiene una longitud erronea (debe estar entre 5 y 50 caracteres)');
				$(inid).focus();
				return false;
			}

			var inid = '#editorial';

			if ($(inid).val().length < 3|| $(inid).val().length > 50) {
				alert('La editorial tiene una longitud erronea (debe estar entre 5 y 50 caracteres)');
				$(inid).focus();
				return false;
			}

			var inid = '#publicacion';
			var str = $(inid).val();

			if ( !isGoodDate(str)) {
				alert('La fecha de publicación tiene un formato erroneo, debe ser DD/MM/AAAA');
				$(inid).focus();
				return false;
			}

			var inid = '#materia';
			var str = $(inid).val();

			if ( !isGoodSelect(str) || str == '' ) {
				alert('Debe seleccionar una materia valida');
				$(inid).focus();
				return false;
			}

			$('#subirreal').click();
		});

		function isGoodDate(dt){
			var reGoodDate = /^(19|20)?[0-9]{4}[- /.]((0?[1-9]|1[012])[- /.](0?[1-9]|[12][0-9]|3[01]))*$/;
			return reGoodDate.test(dt);
		}

		function isGoodSelect(dt){
			var reGoodDate = /^[1-9]*$/;
			return reGoodDate.test(dt);
		}

	</script>
</body>
</html>
