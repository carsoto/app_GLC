<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>GLC | Galapagos Luxury Charters</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles_GLC.css") }}" />
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/bootstrap.min.css") }}" />
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/dataTables.bootstrap.min.css") }}" />
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

</head>
<body>
	@yield('body')
	
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/jquery.dataTables.min.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/dataTables.bootstrap.min.js") }}" type="text/javascript"></script>

  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
  	

  	<script type="text/javascript">
		function validarTexto(e) {
			tecla = (document.all) ? e.keyCode : e.which;
			if (tecla==8) return true;
			patron =/[A-Za-z\s]/;
			te = String.fromCharCode(tecla);
			return patron.test(te);
		}

		function tipoNumeros(e){
			var key = window.event ? e.which : e.keyCode
			return (key >= 48 && key <= 57);
		}

		function tipoMontos(e){
			var key = window.event ? e.which : e.keyCode
			return (key >= 48 && key <= 57 || key == 46 || key == 44); // [46 -> (.)] [44 -> (,)]
		}
	</script>
  	@yield('scripts')
	
</body>
</html>