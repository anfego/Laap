@section("header")

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				<img src={{ asset('images/logo2014.png') }} alt="GaleriaOptica.com"  height="22" width="40">
			</a>
		</div>
	
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Inicio Test</a></li>
				<li><a href=" {{URL::to("apps") }} ">Apps</a></li>
				<li><a href="#contact">Perfil</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menú <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">LabAPP</a></li>
						<li><a href="#">Consultorio</a></li>
						<li class="divider"></li>
						<li class="dropdown-header">Nav header</li>
						<li><a href="#">Separated link</a></li>
						<li><a href="#">One more separated link</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<!-- Este espacio puede ser usado para el login info -->

				<li><a href="logout.php">{{{ isset( Auth::user()->username) ? Auth::user()->username : 'Conectar' }}}</a></li>
			</ul>
		</div> <!--/.nav-collapse -->
	</div>

<div class="header">

	<!-- 
	<div class="jumbotron">
		<img src="images/GaleriaOpticaRedondo.png" alt="GaleriaOptica" class="img-thumbnail">
	</div>
	 -->
		<!-- <img src="images/galeriaOpticaLogo2014.jpg" alt="GaleriaOptica" class="img-thumbnail"> -->
		<!-- <img src="images/GaleriaOptica1024B.png" alt="GaleriaOptica" class="img-thumbnail"> -->
		<!-- <img src="images/GaleriaOptica1920.png" alt="GaleriaOptica" class="img-thumbnail"> -->

</div>
@show
