<?declare (strict_types = 1)?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Web Portal - Includes and requires</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<!--
	A diferencia entre include e require é que se hai algún erro ó ler o archivo indicado, include seguirá executando o resto do programa
	mentres que require terá un erro fatal e o programa deixará de executarse.
-->
<div id="header" class="container">

	<?include "utils/logo.php";?>
	
	<?include "utils/menu.php";?>
	
</div>

<?include "utils/pictures.php";?>

<div id="page">
	<div id="bg1">
		<div id="bg2">
			<div id="bg3">
			
				<?include "utils/content.php";?>
				
				<?include "utils/sidebar.php";?>
				
			</div>
		</div>
	</div>
</div>

<?include "utils/footer.php";?>

</body>
</html>
