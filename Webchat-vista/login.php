<?php

session_start(); //Inicialización de la variable de sesión. 

/*if(isset($_SESSION['user_id'])) {
	header('Location: session-user.php');
}
*/

require 'connect.php'; //Petición de archivo de conexión.

if(!empty($_POST['email']) && !empty($_POST['password'])) {
	$record = $connect->prepare('SELECT userAccountId, email, passwordUser FROM user WHERE email=:email');
	$record->bindParam(':email', $_POST['email']);
	$record->execute();
	$result = $record->fetch(PDO::FETCH_ASSOC);

	$message = '';

	if(count($result) > 0 && password_verify($_POST['password'], $result['passwordUser'])) {
		$_SESSION['user_id'] = $result['userAccountId'];
		header('Location: session-user.php');
	} else {
		$message = 'Las credenciales ingresadas no coinciden o son incorrectas.';
	}
}

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Marble &mdash; Free HTML5 Bootstrap Website Template by FreeHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />


  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight">

			<h1 id="fh5co-logo"><a href="index.php">Webchat</a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
          <li class="fh5co-active"><a href="index.php">Inicio</a></li>
					<li><a href="login.php">Iniciar sesión</a></li>
					<li><a href="about.html">Acerca de</a></li>
					<li><a href="contact.html">Contactos</a></li>
				</ul>
			</nav>

			<div class="fh5co-footer">
        <p class="text-muted">Copyright &copy; Webchat 2017</p>
				<ul>
					<li><a href="#"><i class="icon-facebook2"></i></a></li>
					<li><a href="#"><i class="icon-twitter2"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
					<li><a href="#"><i class="icon-linkedin2"></i></a></li>
				</ul>
			</div>

		</aside>

		<div id="fh5co-main">
			<div class="fh5co-more-contact">
				<div class="fh5co-narrow-content">
					<div class="row">
						<div class="col-md-4">
							<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="fh5co-icon">
									<i class="icon-user-add"></i>
								</div>
								<div class="fh5co-text">
									<p><a href="signup.php">Registrarse</a></p>						
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">

				<div class="row">
					<div class="col-md-4">
						<h2>Iniciar sesión</h2>
					</div>
				</div>
				<form action="login.php" method="POST">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input name="email" type="text" class="form-control" placeholder="Nombre de usuario o correo electrónico">
									</div>
									<div class="form-group">
										<input name="password" type="text" class="form-control" placeholder="Contraseña">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="submit" class="btn btn-primary btn-md" value="Ingresar">
										<?php if(!empty($message)): ?>
                    					<p><h3><font color="#289BAB"> <?= $message ?></font></h3></p>
                   						<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>

	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>
