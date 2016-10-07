<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script type="text/javascript">
		$(function(){

			var aktif = $("#ustmenum ul li a").data("url");
			$("#icerik").load(aktif);

			$("#ustmenum ul li a").click(function(){
				var url = $(this).data("url");
				$("#icerik").load(url);
			});
		});
	</script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/stilim.css">
</head>
<body>
	<div class="row well">
	<div class="col-md-2">Buraya Logom Gelecek</div>
		<div class="col-md-6">Buraya ne geleceğine henüz karar veremedim :)</div>
	<div id="ustmenum" class="col-md-4">
		<ul>
			<li><a data-url="anasayfa.php" title="anasayfa" href="#">ANASAYFA</a></li>
			<li><a data-url="tekhaber.php" href="#">TEKHABER</a></li>
			<li><a data-url="tech.php" href="#">HAVA DURUMU</a></li>
			<li><a data-url="yokartik.php" href="#">YOOK ARTIK</a></li>
		</ul>
	</div>
	</div>
<div class="row">
	<div class="col-md-2">
		<div class="">
			<p><a href="#">HTML</a></p>
			<p><a href="#">CSS</a></p>
			<p><a href="#">JQUERY</a></p>
			<p><a href="#">PHP</a></p>
			<p><a href="#">BOOTSTRAP</a></p>
		</div>
	</div>
	<div id="icerik" class="col-md-7">Yükleniyor...</div>
	<div class="col-md-2">
		<p><a target="_blank" href="http://www.facebook.com/efe.c.ozgur">Facebook</a></p>
		<p><a href="#">Instagram</a></p>
		<p><a href="#">Twitter</a></p>
	</div>
</div>
</body>
</html>