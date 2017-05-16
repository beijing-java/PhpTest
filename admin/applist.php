<!-- <!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="keywords" content=""/>
		<meta name="description" content="">
		<link type="text/css" rel="stylesheet" href="css/Business.css">
		<title></title>
	</head> -->
		<?php require '../db/dblink.php'; ?>
	<style type="text/css">
		.zhifu-contanier{width:950px; height:800px; background:#FFF; margin-top:16px;}
		.title{padding-top: 20px;font-size: 30px;font-weight: 400;line-height: 68px;color: #757575;}
		.first-list{
    		height:30px;line-height:30px;
    		background:#f6f6f6;
    		border-bottom:1px #ececec solid;
    		border-top:1px #ececec solid;
    		font-size:12px;
    		text-align:center; 
		}
		.first-list tr{
     		color:#999999;
     		border-left:1px #ececec solid;
		}
		.first-list th{
     		color:#999999;
     		border-right:1px #ececec solid;
     		width:80px;
		}
		.first-list th:first-child,td:first-child{border-left:1px #ececec solid; }
		.first-list td{
     		color:#999999;
     		border-right:1px #ececec solid;
     		width:80px;
     		background: #fff;
		}
		.search-text{
    		position: absolute;
    		top: 0;right: 41px;
    		z-index: 1;
    		width: 189px;height: 40px;
    		padding: 0 15px;
    		border: 1px solid #e0e0e0;
    		font-size: 12px;
    		line-height: 40px;
    		outline: 0;
    		color: #757575;
		}
	</style>
<?php
	session_start();
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		$user_name = $_SESSION['user_name'];
	}else{
		echo "<script>window.location.href='load.php'</script>";
	}
	
	if(isset($_GET['pagenum'])){
		$pagenum = $_GET['pagenum'];
	}else{
		$pagenum = 0;
	}
?>
	<body>
		<div class="zhifu-contanier" style="width:100%;margin-top:-4rem;" >
    		<div class="weijie-list" style="width:100%; margin:0 auto;">
    			<div style="width:100%;margin-top:1rem;margin-left:1rem;padding:1rem;" align="left">
    				<img src="../images/01.png">
    				<span>app版本管理&nbsp;>>>&nbsp;APP版本列表</span>
    			</div>
                <div class="lidt-infor" style="margin-left:1rem;">
                	<table class="first-list" border="1" cellspacing="0" cellpadding="0">
                    	<tr>
                        	<th style="width:50px;">APPID</th>
                        	<th style="width:150px;">APP名称</th>
                        	<th style="width:200px;">APP版本</th>
                        	<th style="width:780px;">更新说明</th>
                    	</tr>
<?php
	$gukesql = "select * from w_app limit ".($pagenum*20).",20";
	$gkrult = mysqli_query($link, $gukesql);
	while ($gkrow=mysqli_fetch_array($gkrult)){
		$app_id = $gkrow['app_id'];
		$app_name = $gkrow['app_name'];
		$app_no = $gkrow['app_no'];
		$app_info = $gkrow['app_info'];
		echo "<tr border='1px'><td>".$app_id."</td>";
		echo "<td>".$app_name."</td>";
		echo "<td>".$app_no."</td>";
		echo "<td align='left'>".$app_info."</td></tr>";
	}
	
	echo "</table>";
	echo "<p style='margin-top:1rem;width:90%;text-align:right;padding-right:4rem;'>";
	if($pagenum == 0){
		echo "<span style='border:1px #ff7575 solid;pdding:1rem;font-size:1rem;'>上一页</span>";
		echo "<a href='applist.php?pagenum=".($pagenum+1)."' target='mainframe'><span style='margin-left:6rem;border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>下一页</span></a>";
	}else{
		echo "<a href='applist.php?pagenum=".($pagenum-1)."' target='mainframe'><span style='border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>上一页</span></a>";
		echo "<a href='applist.php?pagenum=".($pagenum+1)."' target='mainframe'><span style='margin-left:6rem;border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>下一页</span></a>";
	}
	echo "</p>";
?>
                </div> 
        	</div>
    	</div>
	</body>
<!-- </html> -->
