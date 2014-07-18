
@extends("layouts.navBar")

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
	</div> 

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
					window.location.href = "/public/lab";
					break;
				default:
					alert("ERROR: Accion no valida");
			}
		});
	});
	</script>
@stop