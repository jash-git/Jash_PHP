<form action="" method="post">
  �R:<select name="item">
    <option value="wii">WII</option>
    <option value="ps3">PS3</option>
    <option value="xbox 360">XBOX 360</option>
  </select>
    <input type="submit" name="Submit" value="�R�R�R">
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
		$SW="�A����]�S�R";
	}
	switch ($SW){//����C�y���u����
	case "wii":
	 $SW="�A�R�F wii ";
	break;

	case "ps3":
	 $SW="�A�R�F ps3";
	break;

	case "xbox 360":
	 $SW="�A�R�F xbox 360";
	break;

	default:
	  $SW= "�A����]�S�R";
	}
	boldoutput($SW);

?>