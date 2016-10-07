<?php 
require("vt.php"); 
 
    if($_POST){
        $ad = $_POST['ad'];
        $soyad = $_POST['soyad'];
        $eposta =$_POST['eposta'];
        $tel = $_POST['tel'];  
        echo $ad;
    }
    
    $kayit = mysqli_query($baglan, "INSERT INTO kisi (ad, soyad, eposta, tel) values ('$ad','$soyad','$eposta','$tel')");
    if ($kayit) {
        echo "Kayıt Yapıldı";
    } else{echo "Bir sorun oluştu";}
?>