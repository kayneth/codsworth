<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		$file = "names.txt";
		if(isset($_POST['name'])){
			$nameTry = $_POST['name'];
			print_r(said($nameTry)); die();
		}else{
			$nameTry = "";
		}

		function getList($file){
			$list = file_get_contents($file);
			$listTab =  explode("\n", $list);

			return $listTab;
		}

		function said($nameTry){
			$names = getList($file);

			foreach ($names as $name) {
				if($nameTry == $name){
					return true;
				}
			}
			return false;
		}
	?>

	<form action="" method="POST">
		<input type="text" name="name">
		<input type="submit">
	</form>

	<p><?php if(isset($nameTry)){echo 'Le nom '. $nameTry .' peut être prononcé par Codsworth.';} ?></p>
</body>
</html>