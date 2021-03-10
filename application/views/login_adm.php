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
				<a class="navbar-brand" href="#">Biblioteca Virtual UAH</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="login">Estudiante</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="card card-container">
			<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
			<p id="profile-name" class="profile-name-card"></p>
			<form class="form-signin" method="post">
				<span id="reauth-email" class="reauth-email">Iniciar sesión Administrador</span>
				<input type="text" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus>
				<input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
				<!--
				<div id="remember" class="checkbox">
					<label>
						<input type="checkbox" value="remember-me"> Recordame
					</label>
				</div>
				-->
				<button id="send" class="btn btn-lg btn-primary btn-block btn-signin">Iniciar Sesión</button>
			</form>
			<!--
			<a href="#" class="forgot-password">
				Olvido su contraseña?
			</a>
			-->
		</div>
	</div>
	<script src="js/vendor/jquery-1.11.2.min.js"></script>
	<script type="text/javascript">
		$('#send').click(function(){
			$.post(base+"iniciar_ses_adm", {
				'name' : $('#inputEmail').val(),
				'pass' : $('#inputPassword').val()
			}, function(data){
				if(data){
					if (data == 1) {
						alert('Sesión Iniciada');
						window.location.replace("dashboard");
					} else {
						alert('Usuario o Contraseña Invalidos');
					}
				}
			});
		})
	</script>
</body>
</html>