<form action="" method="post">
  買:<select name="item">
    <option value="wii">WII</option>
    <option value="ps3">PS3</option>
    <option value="xbox 360">XBOX 360</option>
  </select>
    <input type="submit" name="Submit" value="買買買">
</form>
<?php
	function boldoutput($string)
	{
		echo "<b>".$string."</b>";
	}
	$SW="";
	if(isset($_POST["item"]))
	{
		$SW=$_POST["item"];
	}
	else
	{
		$SW="你什麼也沒買";
	}
	switch ($SW){//不像C語言只能整數
	case "wii":
	 $SW="你買了 wii ";
	break;

	case "ps3":
	 $SW="你買了 ps3";
	break;

	case "xbox 360":
	 $SW="你買了 xbox 360";
	break;

	default:
	  $SW= "你什麼也沒買";
	}
	boldoutput($SW);

?>