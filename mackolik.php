<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hava Durumu</title>
</head>
<style type="text/css">
	.oyuncu {
		width: 500px; 
		border:1px solid #ddd;
		height: 201px
	}

	.resim {
		float:left;
		width: 150px; 
		background: #eee;
		height:200px;
		
	}
	.bilgiler ul{
		list-style: none;
		float: left
	}

	.bilgiler ul li {
		padding: 10px
	}
</style>
<body>

<form method="POST" action="mackolik.php">
	<input type="text" name="numara">
	<input type="submit" value="Oyuncu Kodunu Gir">
</form>

<?php 
	if ($_POST) {
		$no = $_POST['numara'];
		if (empty($no)) {
			$no=1;
		}
	}


 ?>




	<?php

	//26236 

			
			$sahife =  "http://www.mackolik.com/Player/Default.aspx?id=".$no;
			//echo $sahife; 
			$site = file_get_contents($sahife);
		
		//$re = '/<div itemscope=""(.*?)<img itemprop="image" src="(.*?)"(.*?)alt="(.*?)"(.*?)src="(.*?)"(.*?)>(.*?)<\/div>(.*?)src="(.*?)"(.*?)name">(.*?)<\/span>(.*?)">(.*?)<\/div>(.*?)<b>(.*?)<\/b>(.*?)datetime=(.*?)">(.*?)<\/time>(.*?)(.*?)<\/div>(.*?)<b>(.*?)<\/b>(.*?)<\/b>(.*?)<\/div>(.*?)<b>(.*?)<\/b>(.*?)<\/b>(.*?)<\/div>(.*?)<b>(.*?)<\/b>(.*?)<\/b>(.*?)<\/div>(.*?)<b>(.*?)<\/b>(.*?)<\/b>(.*?)<\/div>(.*?)<b>(.*?)<\/b>(.*?)<\/b>(.*?)<\/div>(.*?)<\/div>(.*?)<\/div>(.*?)<\/div>(.*?)<\/div>/si';
		$ad = '/bold;">(.*?)<\/h1>/si';
		$resim = '/itemprop="image" src="(.*?)"/si';	
		$ulkesi = '/itemprop="image"(.*?)(.*?)"image" src="(.*?)" alt="(.*?)"/si';	
		$oynadigi_yer_bayrak = '/itemprop="image"(.*?)(.*?)"image" src="(.*?)" alt="(.*?)"(.*?)src="(.*?)"(.*?)alt="(.*?)"/si';

		preg_match_all($ad, $site, $oyuncu_adi);
		preg_match_all($resim, $site, $oyuncu_resmi);
		preg_match_all($ulkesi, $site, $oyuncu_ulkesi);
		preg_match_all($oynadigi_yer_bayrak, $site, $oyuncu_oynadigi);


		$o_adi = $oyuncu_adi[1][0];
		$o_resim = $oyuncu_resmi[1][0];
		$o_ulke_bayrak = $oyuncu_resmi[1][1];
		$o_ulkesi = $oyuncu_ulkesi[4][0];
		$o_oynadigi_yer_bayrak = $oyuncu_oynadigi[6][0];
		$o_oynadigi_yer = $oyuncu_oynadigi[8][0];

		if (empty($o_resim)) {
			# code...
			echo "Oyuncu Bulunamadı"; 
			exit();	
		} else {

	?>

<div class="oyuncu">
	<div class="resim">
		<img height="200" width="150" src="<?php echo $o_resim;?>">
	</div>
	<div class="bilgiler">
		<ul>
			<li>Adı : <?php echo $o_adi;?></li>
			<li>Ülkesi : <?php echo $o_ulkesi;?> <img src="<?php echo $o_ulke_bayrak;?>"></li>
			<li>Oynadığı Yer : <?php echo $o_oynadigi_yer;?></li>
		</ul>
	</div>
	<div class="ulkebayrak">
		<img src="<?php echo $o_oynadigi_yer_bayrak; ?>">
	</div>	
</div>
<?php };?>

</body>
</html>