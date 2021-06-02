   <?php
	//資料來源:https://vectus.wordpress.com/2010/10/12/%E7%94%A8-php-code-%E7%94%B1-mysql-%E5%8C%AF%E5%87%BA-csv-%E6%AA%94%E6%A1%88/
	header('content-type:text/html;charset=utf-8');
	set_time_limit(0);	
      $con = mysql_connect("localhost","root", "usbw");
      if (!$con){
         die('Could not connect: ' . mysql_error());
      }
   
      mysql_select_db("CSV_Import_Export", $con);
	  
      mysql_query("SET NAMES utf8;");
      mysql_query("SET CHARACTER_SET_CLIENT=utf8;");
      mysql_query("SET CHARACTER_SET_RESULTS=utf8;");	  
      $file = fopen("1.csv","w");

      $result = mysql_query("SELECT * FROM csv_table");

      while($row = mysql_fetch_array($result)){
         fputcsv($file, split(',', $row['uid']. "," . $row['name']));
      }

      fclose($file);
      mysql_close($con);

   ?>