<?php require('habervt.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Haber Ayrıntısı</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">


	function kayitYap(){

		var baslik = $("input[name=baslik]").val();
		var resim = $("input[name=resim").val(); 
		var altbaslik = $("input[name=altbaslik]").val();
		var makale = $("textarea[name=mak]").val();

		var veri = "baslik="+baslik+"&resim="+resim+"&altbaslik="+altbaslik+"&makale="+makale;


		$.ajax({
			url:"haberkayit.php",
			type:"POST",
			data:veri,
			success: function(tamam){
				$("input[type=submit]").addClass('btn btn-primary disabled').attr("value","Kayıt Yapıldı");
			},
			error:function(hata){
				alert("bir hata oluştu");
			}
		});
	}
</script>


<style type="text/css">
	body {background: #ddd}
	.haber ul {list-style: none; border:1px solid #ddd; margin: 10px; background: white}
	.haber ul li{padding: 10px;}
	.haber ul li img {border-radius: 15px; background: #ccc}
	.haber ul li p {font-family: Verdana, Tahoma, 'Times New Roman'; font-size:14px; text-align: justify;}

</style>
<body>

<?php 
error_reporting(0); 
	if($_GET){
		$link = $_GET['link'];
	}

	$site = file_get_contents($link);
	$re = '/<h1 itemprop="[a-z]+" id="haber_baslik" class="\s+">(.*?)<\/h1>/';
	//$re2 = '/<img itemprop="image" src="(.*?)"/';
	$re2 = '/<div itemprop="articleBody" class="haber_metni mb20">\s+<img src="(.*?)"/';
	$re3 = '/<h2 itemprop="description" class="[a-zA-Z0-9\s+]+">(.*?)<\/h2>/';
	$re4 = '/<div itemprop="articleBody" class="[a-zA-Z0-9\_\s]+">\s+<p>(.*?)<\/p>/';
	preg_match($re, $site, $baslik);
	preg_match($re2, $site, $resim);
	preg_match($re3, $site, $altbaslik);
	preg_match($re4, $site, $makale);
	$baslik = $baslik[1];
	$resim = $resim[1];
	$altbaslik = $altbaslik[1];

	//$makale = $makale[1];
	$makalem = strip_tags($makale[1], "<br>");	

	if (empty($resim)) {
		$resim = "http://vignette4.wikia.nocookie.net/yenisehir/images/3/3b/Resim_yok.gif/revision/latest?cb=20091012075707&path-prefix=tr";
	} 

	if(empty($makalem)){
		$makalem = "Makale Yok";
	}


	$sorgu = mysqli_query($baglan, "select * from haber where resim='$resim'");

	while ($row = mysqli_fetch_array($sorgu)) {
		if ($row['resim']==$resim) {
			echo "<p style='background:red; color:white; font-size:20px; text-align:center' class='var'>Kayıt Zaten Var</p>";
		} else {echo "Bu Kayıt DB'de yok";}
	}



 ?>
 <div class="table-responsive">

<form action="haberkayit.php" method="POST" onsubmit="return false;">
<table class="table">
	<tr>
		<td>Haber Başlığı</td>
		<td><input class="form-control" name="baslik" type="text" value="<?php echo $baslik;?>"> </td>
	</tr>	
	<tr>
		<td>Resim</td>
		<td><img style="border-radius:10px"  src="<?php echo $resim;?>"> </td>
	</tr>	
	<tr>
		<td>Resim Linki</td>
		<td><input class="form-control" name="resim" type="text" value="<?php echo $resim;?>"> </td>
	</tr>	
	<tr>
		<td>Alt Başlık</td>
		<td><input class="form-control" name="altbaslik" type="text" value="<?php echo $altbaslik;?>"> </td>
	</tr>
	<tr>
		<td>Haber</td>
		<td><textarea class="form-control" name="mak" id="mak" cols="30" rows="10"><?php echo $makalem;?></textarea> </td>

	</tr>
	<tr>
		<td></td>
		<td><input class="form-control" type="submit" value="Kaydet" onclick="kayitYap()"></textarea> </td>
	</tr>	
</table>
</form>
 
 </div>



 </body>
</html>