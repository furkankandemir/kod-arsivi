<?php
	if($_POST){
		/*	Mysql Veritabanı Bağlantısı */
		$connx = mysql_connect("localhost","kullanici-adi","sifre") or die(mysql_error());
		$dbConnx = mysql_select_db("veritabani-adi", $connx) or die(mysql_error());
		/*	Klavyeden girilen veriyi Alma ve işlemleri yapma */
		$value = mysql_real_escape_string(strip_tags(rtrim($_POST['value'])));
		if(!$value){
			echo 'bos';
		}else{
			$find = mysql_query("SELECT * FROM tablo-adi WHERE tablo-oge like '%$value%'");
			if(mysql_affected_rows()){
				while($row = mysql_fetch_assoc($find)){
					echo '<li>'.$row["tablo-oge"].'</li>';
				}
			}else{
				echo 'yok';
			}
		}
	}else{
		header("Location: index.php");
	}
?>
