<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BotumBot</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.bootstrap.min.css">
	<style type="text/css">
		.haberler {
			 
		}
		.haberler ul {
			list-style: none;
			margin-bottom:10px;
			
		}

		.haberler ul li {
			padding:3px;
			background: #FFD4A2;
				

		}
	</style>
</head>
<body>
<?php 
	$site = file_get_contents('http://www.technohaber.net');
	$re = '/<a href="(.*?)"(.*?)title="(.*?)"(.*?)viewport">(.*?)="(.*?)"(.*?)700(.*?)src(.*?)src=(.*?);(.*?)<p>(.*?)<\/p>(.*?)<\/div>(.*?)<\/div>/si';
	preg_match_all($re, $site, $baslik);
	preg_match_all('@<div class="post-b">(.*?)<p>(.*?)</p>(.*?)<a class="rmore" href="(.*?)" title="Devamını Okuyun">(.*?)</a>(.*?)</div>@si', $site, $makale);
	
	//$makale = $makale[2];
	$link = $baslik[1];
	$basligi = $baslik[3];
	$resim = $baslik[10];
	$makale  = $baslik[12];

	for ($a=0; $a < count($resim); $a++) { 
		$resim[$a] = explode("&", $resim[$a]);
	}
	
?>
<div class="haberler">
	<?php 
		for ($i=0; $i < 5; $i++) { 
		
	?>
	<ul>
		<li><center><img style="vertical-align: center" class="img-circle" width="200" height="200" src="<?php echo $resim[$i][0]; ?>"</center></li>
		<li><?php echo "<h1 style='text-align:center'><a href='$link[$i]'>". $basligi[$i] ."</a></h1>"; ?></li>
		<li><?php echo $makale[$i]; ?></li>

	</ul>	
		<?php };?>
</div>
</body>
</html>