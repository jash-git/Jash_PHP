<HTML>
    <HEAD>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8">
        <script language=Javascript>
            function RunTimer(){
				setTimeout("Timer01();", 60000);
            }
			function Timer01(){
				window.location.reload();
			}
        </script>
    </HEAD>
	<Body onload=RunTimer();>	
		<?php
		header("Content-Type:text/html; charset=utf-8");
		set_time_limit(0);//無限等待
		echo '<B>jash-liao 存股-股價即時更新系統:</B><br><br>'; 
		echo '<br><br><br><br><br><br>';
		date_default_timezone_set("Asia/Taipei");
		echo '更新時間:'. date ("Y- m - d / H : i : s"); 
		$time='&t='.date ("YmdHis");
		
		echo "<font size='26' face='Arial'>";//PHP放大字體
		
		echo '<table style="font-size:22px; font-family:Arial; width:500px; border: 1px solid black; border-collapse: collapse;">';	
		$text=file('https://tw.stock.yahoo.com/q/q?s=1232'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>大統益[1232]</td>';
				echo $line;
				echo '</tr>';
			} 
		}
		
		$text=file('https://tw.stock.yahoo.com/q/q?s=2880'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>華南銀行[2880]</td>';
				echo $line;
				echo '</tr>';
			} 
		}
		
		$text=file('https://tw.stock.yahoo.com/q/q?s=4904'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>遠傳[4904]</td>';
				echo $line;
				echo '</tr>';
			} 
		}

		$text=file('https://tw.stock.yahoo.com/q/q?s=8926'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>台汽電[8926]</td>';
				echo $line;
				echo '</tr>';
			} 
		}

		$text=file('https://tw.stock.yahoo.com/q/q?s=1451'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>年興[1451]</td>';
				echo $line;
				echo '</tr>';
			} 
		}

		$text=file('https://tw.stock.yahoo.com/q/q?s=2105'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>正新[2105]</td>';
				echo $line;
				echo '</tr>';
			} 
		}

		$text=file('https://tw.stock.yahoo.com/q/q?s=1233'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>天仁[1233]</td>';
				echo $line;
				echo '</tr>';
			} 
		}
		
		$text=file('https://tw.stock.yahoo.com/q/q?s=9925'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>新保[9925]</td>';
				echo $line;
				echo '</tr>';
			} 
		}
		
		$text=file('https://tw.stock.yahoo.com/q/q?s=1102'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>亞泥[1102]</td>';
				echo $line;
				echo '</tr>';
			} 
		}

		$text=file('https://tw.stock.yahoo.com/q/q?s=1402'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>遠東新[1402]</td>';
				echo $line;
				echo '</tr>';
			} 
		}
		
		$text=file('https://tw.stock.yahoo.com/q/q?s=9930'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>中聯資源[9930]</td>';
				echo $line;
				echo '</tr>';
			} 
		}
		
		$text=file('https://tw.stock.yahoo.com/q/q?s=2104'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>中橡[2104]</td>';
				echo $line;
				echo '</tr>';
			} 
		}
		
		$text=file('https://tw.stock.yahoo.com/q/q?s=2347'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>聯強[2347]</td>';
				echo $line;
				echo '</tr>';
			} 
		}	

		$text=file('https://tw.stock.yahoo.com/q/q?s=1513'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>中興電[1513]</td>';
				echo $line;
				echo '</tr>';
			} 
		}	

		$text=file('https://tw.stock.yahoo.com/q/q?s=3702'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>大聯大[3702]</td>';
				echo $line;
				echo '</tr>';
			} 
		}
		$text=file('https://tw.stock.yahoo.com/q/q?s=1101'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>台泥[1101]</td>';
				echo $line;
				echo '</tr>';
			} 
		}
		$text=file('https://tw.stock.yahoo.com/q/q?s=6281'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>全國電[6281]</td>';
				echo $line;
				echo '</tr>';
			} 
		}
		$text=file('https://tw.stock.yahoo.com/q/q?s=1229'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>聯華[1229]</td>';
				echo $line;
				echo '</tr>';
			} 
		}
		$text=file('https://tw.stock.yahoo.com/q/q?s=1717'.$time);//file_get_contents('https://tw.stock.yahoo.com/q/q?s=4904'); 
		foreach ($text as $line_num => $line) {
			//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
			if (preg_match("/><b>/i", $line))
			{
				echo '<tr style="border: 1px solid black; border-collapse: collapse;">';
				echo '<td>長興[1717]</td>';
				echo $line;
				echo '</tr>';
			} 
		}			
		echo '</table>';
		echo '<br>';
		echo '資料來源:每分鐘跟YAHOO要一次';
		//print_r($text);
		?>
	</Body>
<HTML> 