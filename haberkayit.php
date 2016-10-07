<?php require('habervt.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		if ($_POST) {
			$baslik = $_POST['baslik'];
			$resim = $_POST['resim'];
			$altbaslik = $_POST['altbaslik'];
			$makale = $_POST['makale'];

			$baslik = addslashes($baslik);
			$altbaslik = addslashes($altbaslik);
			$makale = addslashes($makale);



			$sorgu = mysqli_query($baglan, "insert into haber (baslik, resim, altbaslik, makale)values('$baslik','$resim','$altbaslik','$makale')");
			if ($sorgu) {
				echo "kayıt yapıldı";
			} else {echo "bir sorun var dostum".mysqli_error($sorgu);}

		}
	 ?>
</body>
</html>