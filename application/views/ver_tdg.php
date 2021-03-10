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

			<li class="nav-item active">
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

					<h1 class="h3 mb-2 text-gray-800">Trabajos de Grado Disponibles</h1>

					<div class="card shadow mb-4">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>ID</th>
											<th>Titulo</th>
											<th>Autor</th>
											<th>Tutor</th>
											<th>Publicación</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
										<?php if ($tdg){ ?>
											<?php foreach ($tdg as $key) { ?>
												<tr>
													<td><?php echo $key->cod_tdg; ?></td>
													<td><?php echo $key->tdg; ?></td>
													<td><?php echo $key->alumno; ?></td>
													<td><?php echo $key->tutor; ?></td>
													<td><?php echo $key->fecha; ?></td>
													<td>
														<a style="width: 100% !important;" href="ver?r=<?php echo base64_encode($key->url); ?>&t=<?php echo $key->tdg; ?>" target="_blank" type="button" class="btn btn-primary customdlwpdfbtn">VER</a>

														<a style="width: 48% !important;" href="editar_tdg?id=<?php echo $key->cod_tdg; ?>" type="button" class="btn btn-secondary customdlwpdfbtn editar" data-id="<?php echo $key->cod_tdg; ?>" data-toggle="tooltip" data-placement="bottom" title="Editar">E</a>

														<a style="width: 48% !important; float: right;" target="_blank" type="button" class="btn btn-danger customdlwpdfbtn eliminar" data-id="<?php echo $key->cod_tdg; ?>" data-toggle="tooltip" data-placement="bottom" title="Eliminar">X</a>
													</td>
												</tr>
											<?php } ?>
										<?php } else { ?>
											<tr>
												<td colspan="6">SIN RESULTADOS</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
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

	<div id="ModalMsg" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="modal-title">Atención!</h4>
				</div>
				<div class="modal-body">
					<p style="text-align: justify;" id="textomodal"></p>
				</div>
				<div class="modal-footer" id="modal-botonera">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Si Eliminar</button>
				</div>
			</div>
		</div>
	</div>

	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin-2.min.js"></script>
	<script src="vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="js/demo/datatables-demo.js"></script>
	<script type="text/javascript">
		$('[data-toggle="tooltip"]').tooltip()
	</script>
	<script type="text/javascript">
		$('.eliminar').click(function(){
			var idlib = $(this).attr('data-id');

			var desc = $(this).parent().parent().children(":first").next().html()+'. AUTOR: '+$(this).parent().parent().children(":first").next().next().html();

			desc = desc.toUpperCase();

			$('#modal-title').html('Eliminar');
			$('#textomodal').html('Esta seguro que desea eliminar:<br>'+desc);
			$('#modal-botonera').html('<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button><button type="button" class="btn btn-danger" data-dismiss="modal" onclick="eliminar('+idlib+',\''+String(desc)+'\');">Si Eliminar</button>');
			$('#ModalMsg').modal();
			$('#ModalMsg').modal('show');
		})

		function eliminar(id, desc){
			$.post(base+"del_tdg", {
				'id' : id
			}, function(data){
				if(data){
					if (data == 1) {
						alert(desc+' Eliminado con exito');
						location.reload();
					} else {
						alert('Ha ocurrido un error desconocido');
					}
				}
			});
		}
	</script>
</body>
</html>
