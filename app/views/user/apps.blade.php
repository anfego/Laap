@extends("layouts.noNavbar")

@section("navBar")
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				<img src="images/logo2014.png" alt="GaleriaOptica"  height="30" width="20">
			</a>
		</div>
	
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Inicio</a></li>
				<li><a href="/public/apps">Apps</a></li>
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
				<li><a href="logout.php">{{ Auth::user()->username }}</a></li>
			</ul>
		</div> <!--/.nav-collapse -->
	</div>
@stop

@section("content")
	<div id='isotopes' class='clickable isotope clearfix'>
		<div id='laboratorio' class='element'>
			<h2 class='name'>
				<i class = "icon-plus-sign"></i>
					Laboratorio
			</h2>
		</div>
		<div id='consultorio' class='element'>
			<h2 class='name'>
				<i class = "icon-plus-sign"></i>
				Consultorio
			</h2>
		</div>
		<div id='optica' class='element'>
			<h2 class='name'>
				<i class = "icon-plus-sign"></i>
				Optica
			</h2>
		</div>
		<!-- 
		<div id='lista' class='element lanthanoid width1 height1 isotope-item' data-symbol='Hg' data-category='lanthanoid'>
		<h2 class='name'>
		<i class = "icon-plus-sign"></i>
		Shopping List
		</h2>
		</div>
	-->
	</div> <!-- /isotope -->
@stop
@section("scripts")
	<script>

	$(document).ready(function()
	{
		$(".element").click(function()
		{
			var appName = $(this).attr('id');

			switch(appName)
			{
				case "optica":
					window.location.href = "/optica";
					break;
				case 'consultorio':
					window.location.href = "/consultorio";
					break;
				case "laboratorio":
					window.location.href = "/lab";
					break;
				default:
					alert("ERROR: Accion no valida");
			}
		});
	});
	</script>
@stop