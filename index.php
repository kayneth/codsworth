<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Can Codsworth say your name ?</title>
</head>
<body>
	<?php
		$fileName = "names.txt"; //fichier de noms


		//récupère la liste des noms et en fait un tab
		function getList($file){
			$list = file_get_contents($file);
			$listTab =  explode("\n", $list);

			return $listTab;
		}


		//récupère le nom passé en POST et le compare à chaque case du tab
		function said($nameTry, $fileName){
			$names = getList($fileName);
			$ret = false;

			foreach ($names as $name) {
				if($nameTry === trim($name)){
					$ret = true;
				}
			}
			return $ret;
		}


		//si le nom est passé en paramètre
		if(isset($_POST['name'])){
			$nameTry = trim($_POST['name']); // on le met dans une autre var
			if (said($nameTry, $fileName)){ //si le prénom est prononçable
				$result = 'Le nom '. $nameTry .' peut être prononcé par Codsworth.';
			}else{
				$result = 'Le nom '. $nameTry .' n\'est pas prononçable';
			}
		}
		else{
			$nameTry = "";
			$result = "";
		}
	?>

	<form action="" method="POST">
		<input type="text" name="name">
		<input type="submit">
	</form>

	<p><?php echo $result; ?></p>

	<p>Code by Dylan 'Kayneth' Temboucti </p>
</body>
</html>