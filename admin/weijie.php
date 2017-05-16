<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="keywords" content=""/>
		<meta name="description" content="">
		<link type="text/css" rel="stylesheet" href="css/Business.css">
		<title></title>
		<?php  require '../db/dblink.php' ?>
	</head>
	<style type="text/css">
		.zhifu-contanier{
			width:950px; height:800px;
			background:#FFF;
			margin-top:16px;
		}
		.title{
			padding-top: 20px;
			font-size: 30px;font-weight: 400;
			line-height: 68px;
			color: #757575;
		}
		.first-list{
    		height:30px;line-height:30px;
    		background:#f6f6f6;
    		border-bottom:1px #ececec solid;border-top:1px #ececec solid;
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
    		position: absolute;top: 0;right: 41px;
    		z-index: 1;width: 189px;
    		height: 40px;
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
 		<div class="zhifu-contanier" style="width:100%;margin-top:-4rem;background:#fff;" >
    		<div class="weijie-list" style="width:100%; margin:0 auto;">
    			<div style="width:100%;margin-top:1rem;margin-left:1rem;padding:1rem;" align="left">
    				<img src="images/01.png" style="margin-top:2rem;">
    				<span>订单管理&nbsp>>>&nbsp未接订单浏览</span>
    			</div>
                <div class="lidt-infor" style="margin-left:1rem;">
                	<table class="first-list" border="1" cellspacing="0" cellpadding="0">
                    	<tr>
                        	<th style="width:290px;" align="center">订单编号</th>
                        	<th style="width:150px;" align="center">生成时间</th>
                        	<th style="width:240px;" align="center">详情</th>
                        	<th style="width:30px;" align="center">总价/元</th>
<!--                         	<th style="width:80px;" align="center">配送员</th> -->
                        	<th style="width:90px;" align="center">顾客姓名</th>
                        	<th style="width:300px;" align="center">收货地址</th>
                        	<th style="width:100px;" align="center">收货人电话</th>
                    	</tr>
<?php
	$ordersql = "select * from w_order left join w_courier on w_courier.courier_id=w_order.courier_id left join w_user on w_user.user_openid=w_order.user_openid where (w_order.order_static=0) order by order_time desc limit ".($pagenum*20).",20";
	$orderult = mysqli_query($link, $ordersql);
	$ordernum = mysqli_num_rows($orderult);
	if($ordernum != 0){
		$dishnamesql = "select dish_id,dish_name from w_dish";
		$dishrult = mysqli_query($link, $dishnamesql);
		$dishname_id = array();
		while ($dishrow=mysqli_fetch_array($dishrult)){
			$temp = $dishrow[0];
			$dishname_id[$temp] = $dishrow[1];
		}
		while($orderow=mysqli_fetch_array($orderult)){
			$order_no = $orderow['order_no'];
			$order_time = $orderow['order_time'];
			$order_dtl = $orderow['order_dtl'];
			$order_ttl = $orderow['order_ttl'];
			$courier_name = $orderow['courier_name'];
//			$user_openid = $orderow['user_openid'];
			$user_name = $orderow['user_name'];
			$order_adrs = $orderow['order_adrs'];
			$order_phone = $orderow['order_phone'];
			
			if(strstr($order_dtl,";")){
				$dish_num_ary = explode(";", $order_dtl);
				for($i=0;$i<count($dish_num_ary);$i++){
					$dish_num = explode(":", $dish_num_ary[$i]);
					$tempid = $dish_num[0];
					if($i == 0){
						$order_dtl = $dishname_id[$tempid].":".$dish_num[1];
					}else{
						$order_dtl = $order_dtl.";".$dishname_id[$tempid].":".$dish_num[1];
					}
				}
			}else{
				$dish_num = explode(":", $order_dtl);
				$tempid = $dish_num[0];
				$order_dtl = $dishname_id[$tempid].":".$dish_num[1];
			}
			
			echo "<tr><td align='center'>".$order_no."</td>";
			echo "<td align='center'>".date('Y-m-d h:i:s',$order_time)."</td>";
			echo "<td align='left' style='width:240px;display:block;overflow:hidden;white-space: nowrap;text-overflow: ellipsis;'>".$order_dtl."</td>";
			echo "<td align='center'>".$order_ttl."</td>";
			echo "<td align='center'>".$courier_name."</td>";
//			echo "<td align='center'>".$user_openid."</td>";
			echo "<td align='center'>".$user_name."</td>";
			echo "<td align='left' title='".$order_adrs."' style='width:300px;display:block;overflow:hidden;white-space: nowrap;text-overflow: ellipsis;'>".$order_adrs."</td>";
			echo "<td align='center'>".$order_phone."</td></tr>";
		}
	}
	mysqli_free_result($orderult);

			echo "</table>";
			echo "<p style='margin-top:1rem;width:90%;text-align:right;padding-right:4rem;'>";
			if($pagenum == 0){
				echo "<span style='border:1px #ff7575 solid;pdding:1rem;font-size:1rem;'>上一页</span>";
				echo "<a href='weijie.php?pagenum=".($pagenum+1)."' target='mainframe'><span style='margin-left:6rem;border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>下一页</span></a>";
			}else{
				echo "<a href='weijie.php?pagenum=".($pagenum-1)."' target='mainframe'><span style='border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>上一页</span></a>";
				echo "<a href='weijie.php?pagenum=".($pagenum+1)."' target='mainframe'><span style='margin-left:6rem;border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>下一页</span></a>";
			}
			echo "</p>";
?>
                	</table> 
                </div> 
        	</div>
    	</div>
	</body>
</html>

