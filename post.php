<?php
	if($_POST){
		/*	Mysql Veritabanı Bağlantısı */
		$connx = mysql_connect("localhost","kullanıcı-adı","şifre") or die(mysql_error());
		$dbConnx = mysql_select_db("veritabanı-adı", $connx) or die(mysql_error());
		/*	Klavyeden girilen veriyi Alma ve işlemleri yapma */
		$value = mysql_real_escape_string(strip_tags(rtrim($_POST['value'])));
		if(!$value){
			echo 'bos';
		}else{
			$find = mysql_query("SELECT * FROM deger WHERE deger like '$value%'");
			if(mysql_affected_rows()){
				while($row = mysql_fetch_assoc($find)){
					echo '<li>'.$row["deger"].'</li>';
				}
			}else{
				echo 'yok';
			}
		}
	}else{
		header("Location: index.php");
	}
?>
