
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fonksion Öğren</title>
</head>
<body>
<?php 
	class vt {
		private $baglan; 
		public function __construct($host, $user, $pass, $db){
			$this->baglan = mysqli_connect($host, $user, $pass,$db) or die("dostum sorun var");
		}
		public function sorgu ($ifade) {
			$sonuc = mysqli_query($this->baglan, $ifade);
			return $sonuc;
		}

		function ekle($ifade){
			$sonuc = mysqli_query($this->baglan, $ifade);
			return $sonuc; 
		}

	}
 ?>
</body>
</html>