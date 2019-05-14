<div class="preloader">
		<img src="<?=base_url();?>img/loader.gif" alt="Preloader image">
</div>


	<nav class="navbar">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-header" href="#"><img src="<?=base_url();?>img/logo.png" data-active-url="<?=base_url();?>img/logo-active.png" alt=""></a>    <!--    -->
			</div>
			<!-- Collect the nav links, forms, and other content for toggling    -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right main-nav">
					<li><a href="<?= base_url()?>index.php/MiControlador/index/1">Inicio</a></li>
					<li><a href="<?= base_url()?>index.php/MiControlador/index/2">Directorio</a></li>
					<li><a href="<?= base_url()?>index.php/MiControlador/index/3">Servicios</a></li>
					<li><a href="<?= base_url()?>index.php/MiControlador/index/4">Artículos</a></li>
					<li><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Contáctanos</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	
	<header id="intro">
		<div class="container">
			<div class="table">
				<div class="header-text">
					<div class="row">
						<div class="col-md-12 text-center">
							<h3 class="light white">Cuidamos tu Salud</h3>
							<h1 class="white typed">Tu Salud, nuesta meta!!!</h1>
							<span class="typed-cursor">|</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section>
		<div class="cut cut-top"></div>
		<div class="container">
			<div class="row intro-tables">
				<div class="col-md-4">
					<div class="intro-table intro-table-first">
						<h5 class="white heading">Pacientes</h5>
						<div class="owl-carousel owl-schedule bottom">
							<div class="item">
								<div class="schedule-row row">
									<div class="col-xs-6">
										<h5 class="regular white">Citas Progrmadas</h5>
									</div>
									<div class="col-xs-6 text-right">
										<h5 class="white">Horas de Atención</h5>
									</div>
								</div>
								<div class="schedule-row row">
									<div class="col-xs-6">
										<h5 class="regular white">Ginecología</h5>
									</div>
									<div class="col-xs-6 text-right">
										<h5 class="white">8:30 - 10:00</h5>
									</div>
								</div>
								<div class="schedule-row row">
									<div class="col-xs-6">
										<h5 class="regular white">Pediatría</h5>
									</div>
									<div class="col-xs-6 text-right">
										<h5 class="white">8:30 - 10:00</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
						<div class="col-md-4">
							<div class="intro-table intro-table-hover">
								<h5 class="white heading hide-hover">Solicitar Cita</h5>
								<div class="bottom">
									<h4 class="white heading small-heading no-margin regular">Agenda tu cita </h4>
									<h4 class="white heading small-pt">en línea</h4>
									<a href="#" class="btn btn-white-fill expand">Agendar</a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="intro-table intro-table-third">
								<h5 class="white heading">Estámos para Servirte</h5>
								<div class="owl-testimonials bottom">
									<div class="item">
										<h4 class="white heading content">Contamos con Especialistas muy capacitados</h4>
										<h5 class="white heading light author">@MayraniGalán</h5>
									</div>
									<div class="item">
										<h4 class="white heading content">Nuestros especialistas constantemente se actualizan</h4>
										<h5 class="white heading light author">@BenjamínMartinez</h5>
									</div>
									<div class="item">
										<h4 class="white heading content">Buscamos brindar la mejor atención al menor precio</h4>
										<h5 class="white heading light author">@EduardoÁvila</h5>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
			</section>
						
			
			<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content modal-popup">
						<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
						<h3 class="white">Sign Up</h3>
						<form action="" class="popup-form">
							<input type="text" class="form-control form-white" placeholder="Full Name">
							<input type="text" class="form-control form-white" placeholder="Email Address">
							<div class="dropdown">
								<button id="dLabel" class="form-control form-white dropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Pricing Plan
								</button>
								<ul class="dropdown-menu animated fadeIn" role="menu" aria-labelledby="dLabel">
									<li class="animated lightSpeedIn"><a href="#">1 month membership ($150)</a></li>
									<li class="animated lightSpeedIn"><a href="#">3 month membership ($350)</a></li>
									<li class="animated lightSpeedIn"><a href="#">1 year membership ($1000)</a></li>
									<li class="animated lightSpeedIn"><a href="#">Free trial class</a></li>
								</ul>
							</div>
							<div class="checkbox-holder text-left">
								<div class="checkbox">
									<input type="checkbox" value="None" id="squaredOne" name="check" />
									<label for="squaredOne"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
								</div>
							</div>
							<button type="submit" class="btn btn-submit">Submit</button>
						</form>
					</div>
				</div>
			</div>
