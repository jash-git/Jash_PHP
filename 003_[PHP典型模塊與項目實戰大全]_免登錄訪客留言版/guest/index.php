<?php
	require ('config.inc.php'); 		//加載數據庫配置文件
	$pagesize = 5; 						//設定每頁顯示條目數
	if(isset($_GET['page'])&&$_GET['page']!='')
	{
		$page=$_GET['page'];
	}
	else 
	{
		$page=0;
	}
	//連表組合查詢SQL語句
	//c1是info 表的別名
	//c2是reply 表的別名
	//取出info所有欄位和reply.reply_time、reply.reply欄位
	//LEFT JOIN會返回左側(info)資料表中所有資料列，就算沒有符合連接條件，而右側(reply)資料表中如果沒有匹配的資料值就會顯示為「NULL」。
	$sql = "SELECT c1 . * , c2.reply_time, c2.reply FROM info c1 LEFT JOIN reply c2 ON ( c1.id = c2.info_id ) ORDER BY c1.id DESC";
	$numRecord = mysql_num_rows(mysql_query($sql)); 				//獲得結果集中的記錄數
	$totalpage = ceil($numRecord/$pagesize); 						//獲得總頁數，ceil取出最接近的整數
	$recordSql = $sql. " LIMIT ".$page*$pagesize.",".$pagesize; 	//拼接翻頁SQL語句，用LIMIT限制取得資料筆數
	$result = mysql_query($recordSql);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>留言板</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<!--中部內容開始-->
		<div id="content">
			<div id="main">
				<ul>
					<li id="main_top"></li>
						<!--頁首開始-->
						<div id="page" style="margin-right: 30px; margin-top: 8px;">
							<span class="grayborder" style="background-color: #F6F6F6;">
								<a href='login.php'>管理者登錄</a>
							</span>
							<span class="grayborder" style="background-color: #F6F6F6;">
								<a href='post.html'>訪客留言</a>
							</span>
						</div>
						<!--頁首結束-->
					<li id="main_middle" style="padding: 0px 0px 15px 0px;">
						<div class="title_cr">留言板</div>
							<?php
							//循環嵌套開始
							while($rs=mysql_fetch_object($result))
							{
							?>
							<table width="872" border="0" align="center" cellpadding="0" cellspacing="0" class="tab_bbs">
								<tr>
									<td colspan="2" class="title_bbs">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td width="50" class="title_b">&nbsp;</td>
												<td width="400" class="title_b">
													<a href="reply.php?id=<?php echo $rs->id?>">回復</a> | <a href="delete.php?id=<?php echo $rs->id?>">刪除</a> &nbsp;&nbsp;&nbsp;&nbsp;建議
												</td>
												<td width="100" class="title_b">
													<!--留言人--> <?php echo $rs->name?><!--留言人-->
												</td>
												<td class="title_b">
												<!--留言時間--> <?php date_default_timezone_set("Asia/Taipei"); echo date("Y-m-d H:i:s",$rs->content_time);?><!--留言時間-->
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td width="45">&nbsp;</td>
									<td width="823" class="td_bbs">
										<!--留言內容--> <?php echo nl2br(htmlspecialchars($rs->content))?><!--留言內容-->
									</td>
								</tr>
								<tr>
									<td width="45" class="td_bbswhite">
										&nbsp;
									</td>
									<td class="td_bbsgray">
										回復標題：你好 回復人：管理員 回復時間： <?php if($rs->reply_time!="") echo date("Y-m-d H:i:s",$rs->reply_time)?>
									</td>
								</tr>
								<tr>
									<td width="45" class="td_bbs">
										&nbsp;
									</td>
									<td>
										<!--回復留言內容--> <?php echo nl2br(htmlspecialchars($rs->reply))?><!--回復留言內容-->
									</td>
								</tr>
							</table>
							<?php
							//循環嵌套收尾
							}
							?>
						<div style="clear: both;"></div>
						<div id="dashline"></div>
						<!--頁碼開始-->
						<div id="page" style="margin-right: 30px; margin-top: 8px;">
							<span class="grayborder" style="background-color: #F6F6F6;">
								<a href='index.php?page=<?php if ($page<$totalpage-1) echo $page+1;?>'>下一頁</a>
							</span>
							<span class="grayborder" style="background-color: #F6F6F6;">
								<a href='index.php?page=<?php if ($page>0) echo $page-1;?>'>上一頁</a>
							</span>
						</div>
						<!--頁碼結束-->
					</li>
					<li id="main_bt"></li>
				</ul>
			</div>
		</div>
	</body>
</html>