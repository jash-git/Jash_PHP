<?php   
    //----------連接資料庫----------
	$condb=mysql_connect("127.0.0.1", "root", "qwertyuiop");
	if(!$condb)
		die("error:".mysql_error());
	mysql_select_db("webdb",$condb);
	mysql_query("SET NAMES 'big5'");
        mysql_query("SET CHARACTER SET big5"); 	
	//----------連接資料庫---------	

	$sql="INSERT INTO cuty (cutyno, cutyname) VALUES ( '" .$_POST['cutyno']."', '".$_POST['cutyname']."')";
	echo $sql;
    	if(!mysql_query($sql,$condb))
		die("error:".mysql_error());
	mysql_close($condb);
?>
<script>
location.href = "../index.php?$Select=65";
</script>
