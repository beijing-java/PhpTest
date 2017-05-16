<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
		<?php require '../db/dblink.php';?>
		<?php require '../sendmsg.php';?>
    	<link type="text/css" rel="stylesheet" href="css/Business.css">
		<style type="text/css">
			.zhifu-contanier{width:950px; height:800px; background:#FFF; margin-top:16px;}
			.title{padding-top: 20px;font-size: 30px;font-weight: 400;line-height: 68px;color: #757575;}
			.first-list{
    			height:30px;line-height:30px;
    			background:#f6f6f6;
    			border-bottom:1px #ececec solid;border-top:1px #ececec solid;
    			font-size:12px;
    			text-align:center; 
			}
			.first-list tr{color:#999999; border-left:1px #ececec solid;}
			.first-list th{color:#999999; border-right:1px #ececec solid;width:80px;}
			.first-list th:first-child,td:first-child{border-left:1px #ececec solid; }
			.first-list td{
     			color:#999999;
     			border-right:1px #ececec solid;
     			width:80px;
     			background: #fff;
			}
			.search-text{
    			position: absolute;
    			top: 0;right: 41px;z-index: 1;
    			width: 189px;height: 40px;
    			padding: 0 15px;
    			border: 1px solid #e0e0e0;
    			font-size: 12px;
    			line-height: 40px;
    			outline: 0;color: #757575;
			}
			#ti{
				display: inline-block;
				width: 60%;height: 100%;
			}
		</style>
	</head>
<?php
  session_start();
  if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
//    $user_type = $_SESSION['user_type'];
    $user_name = $_SESSION['user_name'];
  }else{
    echo "<script>window.location.href='load.php'</script>";
  }
  if(isset($_GET['cash_static'])){
  	$cash_static = $_GET['cash_static'];
  }

	if(isset($_GET['pagenum'])){
		$pagenum = $_GET['pagenum'];
	}else{
		$pagenum = 0;
	}
?>
	<body>
 		<div class="zhifu-contanier" style="width:100%;margin-top:-4rem;background:#fff;" >
    		<div class="weijie-list" style="width:100%; margin:0 auto;">
    			<div style="width:100%;margin-top:1rem;margin-left:1rem;padding:1rem;" align="left">
    				<img src="images/01.png" style="margin-top:2rem;">
    				<span id="ti">提现申请&nbsp>>>&nbsp浏览</span>
    			</div>
<?php
	if(isset($_GET['cashflg'])){
		$cashflg = $_GET['cashflg'];
		$cash_id = $_GET['cash_id'];
		$courier_phone = $_GET['courier_phone'];
		$cashsql = "update w_cash set cash_static=".$cashflg." where (cash_id=".$cash_id.")";
		$cashrult = mysqli_query($link, $cashsql);
		if($cashrult){
			require_once 'sms/ChuanglanSmsApi.php';
			$clapi  = new ChuanglanSmsApi();
			if($cashflg == 1){
				$sendcode = "您的提现申请已经通过，请及时查看账户信息！";
			}else{
				$sendcode = "您的提现申请未通过，请联系客服！";
			}
			$result = $clapi->sendSMS($courier_phone, $sendcode,'true');
			$result = $clapi->execResult($result);
			if($result[1]==0){
				echo "send successful";
			}else{
				echo "send error";
			}
		}else{
			echo "<script>window.alert('操作失误，请重新操作！')</script>";
		}
	}
?>
    			<div class="lidt-infor" style="margin-left:1rem;">
               		<table class="first-list" border="1" cellspacing="0" cellpadding="0">
                    	<tr>
                    		<th style='width:50px;' align="center">配送员ID</th>
                    		<th style='width:100px;' align="center">姓名</th>
                        	<th style='width:150px;' align="center">申请时间</th>
                        	<th style='width:150px;' align="center">手机号</th>
                        	<th style='width:100px;' align="center">提现钱数</th>
                        	<!-- <th style='width:100px;' align="center">状态</th> -->
                        	<th style='width:200px;' align="center">操作</th>
                    	</tr>
<?php
	if($cash_static == 0){
		$cashsql = "select * from w_cash left join w_courier on w_courier.courier_id=w_cash.courier_id where (cash_static=0 or cash_static=2)";
	}else{
		$cashsql = "select * from w_cash left join w_courier on w_courier.courier_id=w_cash.courier_id where (cash_static=1)";
	}
	$cashrult = mysqli_query($link, $cashsql);
	$cashnum = mysqli_num_rows($cashrult);
	if($cashnum != 0){
		while($cashrow=mysqli_fetch_array($cashrult)){
			$courier_id = $cashrow['courier_id'];
			$courier_name = $cashrow['courier_name'];
			$cash_time = $cashrow['cash_time'];
			$courier_phone = $cashrow['courier_phone'];
			$cash_ttl = $cashrow['cash_ttl'];
			$cash_static = $cashrow['cash_static'];
			$cash_id = $cashrow['cash_id'];
			
			echo "<tr><td align='center'>".$courier_id."</td>";
			echo "<td align='center'>".$courier_name."</td>";
			echo "<td align='center'>".date('Y-m-d h:i:s',$cash_time)."</td>";
			echo "<td align='center'>".$courier_phone."</td>";
			echo "<td align='center'>".$cash_ttl."</td>";
			if($cash_static == 0){
				echo "<td align='center'><a href='tixian.php?cashflg=1&cash_id=".$cash_id."&courier_phone=".$courier_phone."'>通过</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href='tixian.php?cashflg=2&courier_id=".$courier_id."'>不通过</a></td></tr>";
			}
			if($cash_static == 1){
				echo "<td align='center'>已通过</td></tr>";
			}
			if($cash_static == 2){
				echo "<td align='center'><a href='tixian.php?cashflg=1&cash_id=".$cash_id."&courier_phone=".$courier_phone."'>通过</a></td></tr>";
			}
		}
	}
	echo "</table>";
	
	echo "<p style='margin-top:1rem;width:90%;text-align:right;padding-right:4rem;'>";
	if($pagenum == 0){
		echo "<span style='border:1px #ff7575 solid;pdding:1rem;font-size:1rem;'>上一页</span>";
		echo "<a href='tixian.php?pagenum=".($pagenum+1)."&cash_static=<?php echo $cash_static; ?>' target='mainframe'><span style='margin-left:6rem;border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>下一页</span></a>";
	}else{
		echo "<a href='tixian.php?pagenum=".($pagenum-1)."&cash_static=<?php echo $cash_static; ?>' target='mainframe'><span style='border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>上一页</span></a>";
		echo "<a href='tixian.php?pagenum=".($pagenum+1)."&cash_static=<?php echo $cash_static; ?>' target='mainframe'><span style='margin-left:6rem;border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>下一页</span></a>";
	}
	echo "</p>";
?>
                </div> 
        	</div>
    	</div>
</body>
</html>