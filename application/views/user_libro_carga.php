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
	<link rel="stylesheet" href="css/loginstyles.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body style="background-image: linear-gradient(#5e2129, #1e1e1e);">

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

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<i class="icon-calendar"></i>
						<h3 class="panel-title">Cargar Libro</h3>
						<br>
						<small>
							Atención: Todos los libros cargados seran inspeccionados por un administrador, el cual tendra la potestad de eliminarlo o modificarlo segun se requiera.
						</small>
						<br><br>
						<small><b>Mantengamos este espacio libre de spam por el bien de la comunidad estudiantil.</b></small>
					</div>
					
					<div class="panel-body">
						<form id="libroform" class="form-horizontal row-border" action="<?php echo base_url(); ?>subir_libro" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-md-2 control-label">Titulo</label>
								<div class="col-md-10">
									<input id="titulo" class="form-control" type="text" name="titulo" required autofocus>
									<span class="help-block">Debe ser exactamente como lo muestra el libro</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Autor</label>
								<div class="col-md-10">
									<input id="autor" class="form-control" type="text" name="autor" required autofocus>
									<span class="help-block">Debe ser exactamente como lo muestra el libro</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Editorial</label>
								<div class="col-md-10">
									<input id="editorial" class="form-control" type="text" name="editorial" required autofocus>
									<span class="help-block">Debe ser exactamente como lo muestra el libro</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Publicación</label>
								<div class="col-md-10">
									<input id="publicacion" class="form-control" type="date" name="publicacion" required autofocus>
									<span class="help-block">Debe ser exactamente como la muestra el libro</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Materia</label>
								<div class="col-md-10">
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
								<div class="col-md-10">
									<input class="form-control" type="file" name="archivo" required autofocus>
									<span class="help-block">Debe ser en formato PDF</span>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 control-label"></label>
								<div class="col-md-10">
									<div class="row">
										<div class="col-xs-6 col-sm-6 col-md-3">
											<a id="subir" class="btn btn-lg btn-primary btn-block btn-signin" style="cursor: pointer; line-height: 35px;">
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

	<?php if($cargolibro == 0 && !isset($_GET["msg"])) { ?>
	<div id="ModalAlert" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Atención Estudiante!</h4>
				</div>
				<div class="modal-body">
					<p style="text-align: justify;">Te recordamos que para poder acceder a los cientos de libros que posee esta biblioteca, necesitamos de al menos un aporte de tu parte, asi para cada dia poder suministrar mas textos a la comunidad estudiantil de la Universidad Alejandro de Humboldt.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">De Acuerdo!</button>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

	<?php if(isset($_GET["msg"])) { ?>
	<div id="ModalMsg" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Atención Estudiante!</h4>
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

	<footer style="background-color: #1e1e1e; color: white;">
		<p style="color: white;"> &copy; 2019 Universidad Alejandro de Humboldt | Desarrollado por <em> Renzo Zue y Khristofer Ramirez</em></p>
	</footer>

	<script src="js/vendor/jquery-1.11.2.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript">
		var xhr = $.post();

		<?php if($cargolibro == 0 && !isset($_GET["msg"])) { ?>
		$('#ModalAlert').modal();
		$('#ModalAlert').modal('show');
		<?php } ?>

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