<?
/*
 * OIC - the Online Image Converter                   
 * Copyright (C) 2001 Ray Lopez (http://www.TheDreaming.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */



function image2jpg($im) {
        $timeer = microtime();
        $filename = "tmp/$timeer.jpg";
        imagejpeg($im, $filename);
        return($filename);
}

function image2gif($im) {
        $timeer = microtime();
        $filename = "tmp/$timeer.gif";
        imagegif($im, $filename);
        return($filename);
}

function image2bmp($im) {
        $timeer = microtime();
        $filename = "tmp/$timeer.bmp";
        imagegif($im, $filename);
        return($filename);
}

function image2png($im) {
        $timeer = microtime();
        $filename = "tmp/$timeer.png";
        imagegif($im, $filename);
        return($filename);
}

function convertArray() {
	$arrConvert[] = "GIF";
	$arrConvert[] = "JPG";
	$arrConvert[] = "BMP";
	$arrConvert[] = "PNG";
	return $arrConvert;
}

function cleanTemp($old) {
	$currentTime = time();
	$handle=opendir("tmp/");
	if($handle == false)
	{
		print("Create tmp/ directory.");
		die();
	}
	while (false!==($file = readdir($handle))) {
		if ($file != "." && $file != "..") { 
			$fileDate = filemtime($file); 
			if(($currentTime - $fileDate) > $old) {
				unlink("tmp/".$file);
			}
		}
	}	
}

function jsWindoPopUp($image, $width, $height) {
	print("<script language=javascript>");
	//print("<br><a href=# onClick='");
	print("	window.open(\"$image\" ,\"OICImage\",\"width=$width,height=$height,menubar=0,resizable=0,scrollbars=0,status=0,titlebar=0,toolbar=0,hotkeys=0,locationbar=0\");");
	//print("'>View Image</a><br>");
	print("</script>");

}
function imagecreatefrombmp($p_sFile)//http://stackoverflow.com/questions/4048863/how-to-create-a-thumbnail-of-bmp-file
{
    $file    =    fopen($p_sFile,"rb");
    $read    =    fread($file,10);
    while(!feof($file)&&($read<>""))
        $read    .=    fread($file,1024);
    $temp    =    unpack("H*",$read);
    $hex    =    $temp[1];
    $header    =    substr($hex,0,108);
    if (substr($header,0,4)=="424d")
    {
        $header_parts    =    str_split($header,2);
        $width            =    hexdec($header_parts[19].$header_parts[18]);
        $height            =    hexdec($header_parts[23].$header_parts[22]);
        unset($header_parts);
    }
    $x                =    0;
    $y                =    1;
    $image            =    imagecreatetruecolor($width,$height);
    $body            =    substr($hex,108);
    $body_size        =    (strlen($body)/2);
    $header_size    =    ($width*$height);
    $usePadding        =    ($body_size>($header_size*3)+4);
    for ($i=0;$i<$body_size;$i+=3)
    {
        if ($x>=$width)
        {
            if ($usePadding)
                $i    +=    $width%4;
            $x    =    0;
            $y++;
            if ($y>$height)
                break;
        }
        $i_pos    =    $i*2;
        $r        =    hexdec($body[$i_pos+4].$body[$i_pos+5]);
        $g        =    hexdec($body[$i_pos+2].$body[$i_pos+3]);
        $b        =    hexdec($body[$i_pos].$body[$i_pos+1]);
        $color    =    imagecolorallocate($image,$r,$g,$b);
        imagesetpixel($image,$x,$height-$y,$color);
        $x++;
    }
    unset($body);
    return $image;
}
?>
