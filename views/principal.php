<!DOCTYPE html>

<html>

<head>

	<meta charset = "utf-8">
	<title>Ventas</title>

	<?php

		$web = Routes::Web();

	?>

	<link href = "https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel = "stylesheet">
	<link href = "<?php echo $web ?>/views/css/styles.css" rel = "stylesheet">

	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src = "https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>

	<div class = "container">

		<a href = "<?php echo $web ?>">

			<h1 class = "text-primary text-center">Sistema de Ventas</h1>

		</a>

		<div class = "space-6"></div>

		<?php

			$ruta = array();

			if(!isset($_GET["ruta"]))
			{

				include("contents/home.php");

			}
			else
			{

				$ruta = explode("/", $_GET["ruta"]);

				if($ruta[0] == "products" || $ruta[0] == "bills" || $ruta[0] == "sales")
				{

					include("contents/".$ruta[0].".php");

				}

			}

		?>

	</div>

	<input type = "hidden" value = "<?php echo $web ?>" id = "principal">

	<script src = "<?php echo $web ?>/views/js/principal.js"></script>
	
</body>

</html>