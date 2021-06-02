<?PHP
	$tempTime	= "1800"; // Number of seconds to hold files in the temp director
	function cleanTemp($old) {
		$currentTime = time();
		$handle=opendir("temp/");
		if($handle == false)
		{
			print("Create temp/ directory.");
			die();
		}
		while (false!==($file = readdir($handle))) {
			if ($file != "." && $file != "..") { 
				$fileDate = filemtime($file);
				echo "temp/".$file."&nbsp;&nbsp;&nbsp;&nbsp;";
				echo $fileDate;
				if(($currentTime - $fileDate) > $old) {
					unlink("temp/".$file);
					echo "&nbsp;&nbsp;&nbsp;&nbsp;kill<br>";
				}
			}
		}	
	}
	cleanTemp($tmpTime);
?>