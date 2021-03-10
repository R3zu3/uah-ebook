<!doctype html>
<html class="no-js" lang="es">
<head>
	<script type="text/javascript">
		var base = '<?php echo base_url(); ?>';
	</script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>BIBLIOTECA VIRTUAL UAH</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/fontAwesome.css">
	<link rel="stylesheet" href="css/templatemo-style.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
	<div class="overlay" style="z-index: 0 !important; position: fixed; background-color: rgba(255, 255, 255, 0.54);"></div>

	<nav class="navbar navbar-default" style="border-radius: 0;">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="biblioteca">Biblioteca Virtual UAH</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a style="text-transform: uppercase;"><?php echo $username; ?></a></li>
					<li><a href="biblioteca">Buscar Libros</a></li>
					<li><a href="cargar_libro_user">Cargar Libro</a></li>
					<li><a href="datos_user">Contraseña</a></li>
					<li><a href="cerrar_ses_user">Cerrar Sesión</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<section class="top-part">
		<video controls autoplay loop> <source src="videos/video.mp4" type="video/mp4"> <source src="videos/video.ogg" type="video/ogg">
			Your browser does not support the video tag.
		</video>
	</section>
	<section class="cd-hero">
		<div class="cd-slider-nav">
			<nav>
				<span class="cd-marker item-1"></span>
				<ul>
					<li class="selected">
						<a href="#0">
							<div class="image-icon" style="background: #5e2129;">
								<img width="50" src="img/calendario.png">
							</div>
							<h6 style="color: #1e1e1e;">Semestres</h6>
						</a>
					</li>

					<li>
						<a href="#0">
							<div class="image-icon" style="background: #5e2129;">
								<img width="55" src="img/libro.png">
							</div>
							<h6 style="color: #1e1e1e;">Materias</h6>
						</a>
					</li>

					<li>
						<a href="#0">
							<div class="image-icon" style="background: #5e2129;">
								<img width="50" src="img/text.png">
							</div>
							<h6 style="color: #1e1e1e;">Libros</h6>
						</a>
					</li>

					<li>
						<a href="#0">
							<div class="image-icon" style="background: #5e2129;">
								<img width="50" src="img/tgt.png">
							</div>
							<h6 style="color: #1e1e1e;">TG-UAH</h6>
						</a>
					</li> 
				</ul>

			</nav> 
		</div>

		<ul class="cd-hero-slider">

			<li class="selected">
				<div class="heading">
					<h1 style="color: #1e1e1e;">Semestres</h1>
				</div>
				<div class="cd-full-width">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="content first-content" style="padding: 0; border-top: 15px solid #5e2129;">

									<div class="panel panel-default" style="border: none; box-shadow: none; margin-bottom: 0;">
										<div class="panel-heading clearfix">
											<i class="icon-calendar"></i>
											<h3 class="panel-title">Buscar por Semestre y Materia</h3>
										</div>

										<div class="panel-body" style="padding-bottom: 0;">
											<form class="form-horizontal row-border" action="#">
												<div class="form-group">
													<div class="col-md-12">
														<select class="form-control" id="sem_select">
															<option value="0" selected="selected">Seleccione el semestre</option>
															<?php foreach ($semestres as $key) { ?>
																<option value="<?php echo $key->cod_semestre; ?>">
																	Semestre <?php echo $key->cod_semestre; ?>
																</option>
															<?php } ?>
														</select>
														<span class="help-block">Seleccione el semestre que desea consultar</span>
													</div>
												</div>

												<div class="form-group">
													<div class="col-md-12">
														<select class="form-control" id="mat_select" disabled>
															<option value="0" selected="selected">
																Seleccione primero un semestre
															</option>
														</select>
														<span class="help-block">Seleccione la materia que desea consultar</span>
													</div>
												</div>

											</form>
										</div>
									</div>

									<div class="panel panel-default" style="border: none; box-shadow: none;">
										<div class="panel-heading clearfix">
											<i class="icon-calendar"></i>
											<h3 class="panel-title">Resultados</h3>
										</div>
									</div>

									<div class="container-table100" style="padding: 13px; background: #ff000000; min-height: auto;">
										<div class="wrap-table100">
											<div class="table100">

												<table id="stable">
													<thead>
														<tr class="table100-head" style="width: 100%;">
															<th class="column1">Seleccione el semestre para buscar</th>
														</tr>
													</thead>
												</table>

												<table id="rtable" style="display: none;">
													<thead>
														<tr class="table100-head">
															<th class="column1">Nombre</th>
															<th class="column2">Autor</th>
															<th class="column3">Editorial</th>
															<th class="column4">Publicación</th>
															<th class="column5">Semestre</th>
															<th class="column6">Materia</th>
															<th class="column7">Descargar</th>
														</tr>
													</thead>
													<tbody id="libroscont">

													</tbody>
												</table>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</li>

			<li>
				<div class="heading">
					<h1 style="color: #1e1e1e;">Materias</h1> 
				</div>
				<div class="cd-full-width">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="content first-content" style="padding: 0; border-top: 15px solid #5e2129;">

									<div class="panel panel-default" style="border: none; box-shadow: none; margin-bottom: 0;">
										<div class="panel-heading clearfix">
											<i class="icon-calendar"></i>
											<h3 class="panel-title">Buscar por Materia</h3>
										</div>

										<div class="panel-body" style="padding-bottom: 0;">
											<form class="form-horizontal row-border" action="#">
												<div class="form-group">
													<div class="col-md-12">
														<select class="form-control" id="mat_select2">
															<option value="0" selected="selected">Seleccione la materia</option>
															<?php foreach ($materias as $key) { ?>
																<option value="<?php echo $key->cod_materia; ?>">
																	<?php echo $key->materia; ?>
																</option>
															<?php } ?>
														</select>
														<span class="help-block">Seleccione la materia que desea consultar</span>
													</div>
												</div>

											</form>
										</div>
									</div>

									<div class="panel panel-default" style="border: none; box-shadow: none;">
										<div class="panel-heading clearfix">
											<i class="icon-calendar"></i>
											<h3 class="panel-title">Resultados</h3>
										</div>
									</div>

									<div class="container-table100" style="padding: 13px; background: #ff000000; min-height: auto;">
										<div class="wrap-table100">
											<div class="table100">

												<table id="stable2">
													<thead>
														<tr class="table100-head" style="width: 100%;">
															<th class="column1">Seleccione la materia para buscar</th>
														</tr>
													</thead>
												</table>

												<table id="rtable2" style="display: none;">
													<thead>
														<tr class="table100-head">
															<th class="column1">Nombre</th>
															<th class="column2">Autor</th>
															<th class="column3">Editorial</th>
															<th class="column4">Publicación</th>
															<th class="column5">Semestre</th>
															<th class="column6">Materia</th>
															<th class="column7">Descargar</th>
														</tr>
													</thead>
													<tbody id="libroscont2">

													</tbody>
												</table>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>                  
					</div>
				</div>
			</li>

			<li>
				<div class="heading">
					<h1 style="color: #1e1e1e;">Libros</h1> 
				</div>
				<div class="cd-full-width">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="content first-content" style="padding: 0; border-top: 15px solid #5e2129;">

									<div class="panel panel-default" style="border: none; box-shadow: none;">
										<div class="panel-heading clearfix">
											<i class="icon-calendar"></i>
											<h3 class="panel-title">Todos los Libros</h3>
										</div>
									</div>

									<div class="container-table100" style="padding: 13px; background: #ff000000; min-height: auto;">
										<div class="wrap-table100">
											<div class="table100">

												<table id="stable3">
													<thead>
														<tr class="table100-head" style="width: 100%;">
															<th class="column1">Buscando...</th>
														</tr>
													</thead>
												</table>

												<table id="rtable3" style="display: none;">
													<thead>
														<tr class="table100-head">
															<th class="column1">Nombre</th>
															<th class="column2">Autor</th>
															<th class="column3">Editorial</th>
															<th class="column4">Publicación</th>
															<th class="column5">Semestre</th>
															<th class="column6">Materia</th>
															<th class="column7">Descargar</th>
														</tr>
													</thead>
													<tbody id="libroscont3">

													</tbody>
												</table>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>                  
					</div>
				</div>
			</li>

			<li>
				<div class="heading">
					<h1 style="color: #1e1e1e;">Trabajos de Grado</h1> 
				</div>
				<div class="cd-full-width">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="content first-content" style="padding: 0; border-top: 15px solid #5e2129;">

									<div class="panel panel-default" style="border: none; box-shadow: none;">
										<div class="panel-heading clearfix">
											<i class="icon-calendar"></i>
											<h3 class="panel-title">Trabajos de Grado</h3>
										</div>
									</div>

									<div class="container-table100" style="padding: 13px; background: #ff000000; min-height: auto;">
										<div class="wrap-table100">
											<div class="table100">

												<table id="stable4">
													<thead>
														<tr class="table100-head" style="width: 100%;">
															<th class="column1">Buscando...</th>
														</tr>
													</thead>
												</table>

												<table id="rtable4" style="display: none;">
													<thead>
														<tr class="table100-head">
															<th class="column1">Titulo</th>
															<th class="column2">Autor</th>
															<th class="column3">Tutor</th>
															<th class="column4">Publicación</th>
															<th class="column5">Descargar</th>
														</tr>
													</thead>
													<tbody id="libroscont4">

													</tbody>
												</table>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</li>

		</ul>
	</section>

	<footer style="background-color: #1e1e1e; color: white;">
		<p style="color: white;"> &copy; 2019 Universidad Alejandro de Humboldt | Desarrollado por <em> Renzo Zue y Khristofer Ramirez</em></p>
	</footer>

	<script src="js/vendor/jquery-1.11.2.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>

	<script type="text/javascript">

		var xhr = $.post();

		$('#sem_select').on('input', function(){
			xhr.abort();

			if ($(this).val() == 0) {
				$('#stable th').html('Seleccione el semestre para buscar');
				$('#mat_select').html('<option value="0" selected="selected">Seleccione primero un semestre</option>');
				$('#mat_select').attr("disabled","");
				$('#rtable').hide();
				$('#stable').show();
				return false;
			}

			$('#libroscont').html('');

			$('#stable').show();
			$('#stable th').html('Buscando Libros...');
			$('#rtable').hide();

			$('#mat_select').html('<option value="0" selected="selected">Buscando materias...</option>');
			$('#mat_select').attr("disabled","");

			xhr = $.post(base+"materias", {
				'semestre' : $('#sem_select').val()
			}, function(data){
				if(data){
					$('#mat_select').html(data);
					$('#mat_select').removeAttr("disabled");
				}
			});

			xhr = $.post(base+"libros_semestres", {
				'semestre' : $('#sem_select').val()
			}, function(data){
				if(data){
					$('#libroscont').html(data);
					$('#rtable').show();
					$('#stable').hide();
				}
			});
		})

		$('#mat_select').on('input', function(){
			xhr.abort();

			$('#libroscont').html('');

			$('#stable').show();
			$('#stable th').html('Buscando Libros...');
			$('#rtable').hide();

			if ($(this).val() == 0) {
				$('#stable th').html('Seleccione la materia para buscar');
				return false;
			}

			xhr = $.post(base+"libros_materias", {
				'materia' : $('#mat_select').val()
			}, function(data){
				if(data){
					$('#libroscont').html(data);
					$('#rtable').show();
					$('#stable').hide();
				}
			});
		})

		$('#mat_select2').on('input', function(){
			xhr.abort();

			$('#libroscont2').html('');

			$('#stable2').show();
			$('#stable2 th').html('Buscando Libros...');
			$('#rtable2').hide();

			if ($(this).val() == 0) {
				$('#stable2 th').html('Seleccione la materia para buscar');
				return false;
			}

			xhr = $.post(base+"libros_materias", {
				'materia' : $('#mat_select2').val()
			}, function(data){
				if(data){
					$('#libroscont2').html(data);
					$('#rtable2').show();
					$('#stable2').hide();
				}
			});
		})

		$.post(base+"libros_total", {}, function(data){
			if(data){
				$('#libroscont3').html(data);
				$('#rtable3').show();
				$('#stable3').hide();
			}
		});

		$.post(base+"tdg_total", {}, function(data){
			if(data){
				$('#libroscont4').html(data);
				$('#rtable4').show();
				$('#stable4').hide();
			}
		});

	</script>
	<style type="text/css">
		.cd-slider-nav ul .selected h6 {
			color: white;
			text-decoration: underline;
		}
	</style>
</body>
</html>