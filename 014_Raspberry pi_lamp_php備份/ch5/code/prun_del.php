<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>刪除產品單位</title>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>
<?php
//----------連接資料庫----------
	include("mysqlcntdb.php");
//----------連接資料庫----------
if ($check == del) 
	{
		//----------- 將產品單位新增至資料庫中---------- 
		$SQLStr = "DELETE FROM prun WHERE prunno = '$prunno' LIMIT 1 ";
		mysql_query("SET NAMES 'big5'");
        mysql_query("SET CHARACTER SET big5"); 
		mysql_query($SQLStr);
		//----------- 將產品單位新增至資料庫中---------- 		
	}

	//---------- 取出所有類別----------
	$SQLStr = "SELECT * FROM prun";	
	$res = mysql_query($SQLStr);
	//---------- 取出所有類別 ----------
?>
<form name="form1" method="post" action="./code/prun_del_db.php">
  <table width="750" border="1" cellpadding="0" cellspacing="0" align="center" bordercolor="#0000FF">
    <tr> 
      <td  bgcolor="#CCFFFF"> 
        <table width="400" border="0" align="center">
          <tr> 
            <td width="100%" bgcolor="#CCFFFF" align="center"> 
             <font bgcolor="#CCFFFF">刪除產品單位</font>
            </td>            
          </tr>
        </table>
  <table width="750" border="1" cellspacing="0" cellpadding="0" bordercolor="#9999FF">
    <tr>
      <td>
        <table width="750" border="1" cellspacing="0" bgcolor="#FFFFFF">
          <tr> 
            <td bgcolor="#CCCCCC" align="center">現有產品單位代碼</td>
			<td bgcolor="#CCCCCC" align="center">現有產品單位名稱</td>
          </tr>
          <?
	       //---------- 取出現有產品單位並呈現於網頁上---------- 
	       $sql="select * from prun ";
           $rows=mysql_query($sql);
           while(list($prunno , $prunname )=@mysql_fetch_row($rows)) {
               echo "
                    <tr bgcolor='#F7F7F7'>
                       <td><font size='-1'>$prunno</font></td>
                       <td><font size='-1'>$prunname</font></td>                
                    </tr>
                    ";
                     }
		  //---------- 取出現有產品單位並呈現於網頁上---------- 
          ?>    
	   </table>
      </td>
    </tr>
 </table>
 <table width="400" border="0" align="center">          
          <tr > 
            <td bgcolor="#0000CC" align="center" ><font color="#FFFFFF">單位</font>  
                <input type="text" name="prunno">
				<input type="text" name="prunname">
                <input type="submit" name="Submit" value="刪除">
            </td>			
          </tr> 
	 </table>        
</table>
</form>

