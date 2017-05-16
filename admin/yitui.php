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
		*{margin:0;padding:0;}
		html,body{height: 100%;background:#fefefe;}
		body{font-size:2.5rem;font-family:"Microsoft YaHei";}
		ul,li{list-style:none;}

		#tab{position:relative; margin-left:0.1%;}
		#tab .tabList ul li{
			float:left;
			background:#fefefe;
			background:-moz-linear-gradient(top, #fefefe, #ededed);	
			background:-o-linear-gradient(left top,left bottom, from(#fefefe), to(#ededed));
			background:-webkit-gradient(linear,left top,left bottom, from(#fefefe), to(#ededed));
			border:1px solid #ccc;
			padding:1% 0;
			width:49.8%;
			text-align:center;
			margin-left:-1px;
			position:relative;
			cursor:pointer;
			font-size: 1rem;
		}
		#tab .tabCon{
			position:absolute;
			left:-1px;top:47px;
			border:1px solid #ccc;
			border-top:none;
			width:99.7%;height:800px;
		}
		#tab .tabCon div{
			padding:10px;
			position:absolute;
			display: none;
		}
		#tab .tabList li.cur{
			border-bottom:none;
			background:#fff;
		}
		#tab .tabCon div.cur{display: block;}
		
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
		
		.title1{
			padding-top: 20px;
			font-size: 30px;font-weight: 400;
			line-height: 68px;
			color: #757575;
		}
		.first-list1{
    		height:30px;line-height:30px;
    		background:#f6f6f6;
    		border-bottom:1px #ececec solid;border-top:1px #ececec solid;
    		font-size:12px;
    		text-align:center; 
		}
		.first-list1 tr{
     		color:#999999;
     		border-left:1px #ececec solid;
		}
		.first-list1 th{
     		color:#999999;
     		border-right:1px #ececec solid;
     		width:80px;
		}
		.first-list1 th:first-child,td:first-child{border-left:1px #ececec solid; }
		.first-list1 td{
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
	if(isset($_GET['pgnum'])){
		$pgnum = $_GET['pgnum'];
	}else{
		$pgnum = 0;
	}
?>
	<body>
 		
  <div id="tab">
  <div class="tabList">
	<ul>
		<li class="cur">订单管理&nbsp>>>&nbsp配送员退接订单浏览</li>
		<li>订单管理&nbsp>>>&nbsp顾客退接订单浏览</li>
	</ul>
  </div>
  <?php
  	if(isset($_GET['shenflg'])){
  		$order_id = $_GET['order_id'];
  		$shenflg = $_GET['shenflg'];
  		if($shenflg == 1){//配送眼申请退单
  			$tuisql = "update w_order set order_static=0 where (order_id=".$order_id.")";
  			$tuirult = mysqli_query($link, $tuisql);
  			if($tuirult){
  				echo "<script>window.alert('审批通过！')</script>";
  			}else{
  				echo "<script>window.alert('操作失误，请重新操作！')</script>";
  			}
  		}
  		if($shenflg == 2){
  			$tuisql = "update w_order set order_static=7 where (order_id=".$order_id.")";
  			$tuirult = mysqli_query($link, $tuisql);
  			if($tuirult){
  				echo "<script>window.alert('审批通过！')</script>";
  			}else{
  				echo "<script>window.alert('操作失误，请重新操作！')</script>";
  			}
  		}
  	}
  ?>
  <div class="tabCon">
	<div class="cur">
		<table class="first-list" border="1" cellspacing="0" cellpadding="0">
		                    	<tr>
		                        	<th style="width:280px;" align="center">订单编号</th>
		                        	<th style="width:130px;" align="center">生成时间</th>
		                        	<th style="width:200px;" align="center">退单理由</th>
		                        	<th style="width:30px;" align="center">总价/元</th>
		                        	<!-- <th style="width:80px;" align="center">退单配送员</th> -->
		                        	<!-- <th style="width:100px;" align="center">顾客openid</th> -->
		                        	<th style="width:90px;" align="center">顾客姓名</th>
		                        	<th style="width:200px;" align="center">收货地址</th>
		                        	<th style="width:100px;" align="center">收货人电话</th>
		                        	<th style="width:50px;" align="center">审批</th>
		                    	</tr>
		<?php
			$ordersql = "select * from w_order left join w_courier on w_courier.courier_id=w_order.order_back_courier left join w_user on w_user.user_openid=w_order.user_openid where (w_order.order_static=3) order by order_time desc limit ".($pgnum*20).",20";
			$orderult = mysqli_query($link, $ordersql);
			$ordernum = mysqli_num_rows($orderult);
			if($ordernum != 0){
				while($orderow=mysqli_fetch_array($orderult)){
					$order_no = $orderow['order_no'];
					$order_time = $orderow['order_time'];
					$order_id = $orderow['order_id'];
					$order_ttl = $orderow['order_ttl'];
					$courier_name = $orderow['courier_name'];
					$user_openid = $orderow['user_openid'];
					$user_name = $orderow['user_name'];
					$order_adrs = $orderow['order_adrs'];
					$order_phone = $orderow['order_phone'];
					$order_back_memo = $orderow['order_back_memo'];
					if($order_back_memo == ""){
						$order_back_memo = "&nbsp;";
					}
						
					echo "<tr><td align='center'>".$order_no."</td>";
					echo "<td align='center'>".date('Y-m-d h:i:s',$order_time)."</td>";
					echo "<td align='left' title='".$order_back_memo."' style='width:200px;overflow:hidden;display:block;white-space: nowrap;text-overflow: ellipsis;'>".$order_back_memo."</td>";
					echo "<td align='center'>".$order_ttl."</td>";
					echo "<td align='center'>".$courier_name."</td>";
					echo "<td align='center'>".$user_name."</td>";
					echo "<td align='left' title='".$order_adrs."' style='width:200px;overflow:hidden;display:block;white-space: nowrap;text-overflow: ellipsis;'>".$order_adrs."</td>";
					echo "<td align='center'>".$order_phone."</td>";
					echo "<td align='center'><a href='yitui.php?shenflg=1&order_id=".$order_id."'>审批</a></td></tr>";
				}
			}
			mysqli_free_result($orderult);

			echo "</table>";
			echo "<p style='margin-top:1rem;width:90%;text-align:right;padding-right:4rem;'>";
			if($pgnum == 0){
				echo "<span style='border:1px #ff7575 solid;pdding:1rem;font-size:1rem;'>上一页</span>";
				echo "<a href='yitui.php?pgnum=".($pgnum+1)."' target='mainframe'><span style='margin-left:6rem;border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>下一页</span></a>";
			}else{
				echo "<a href='yitui.php?pgnum=".($pgnum-1)."' target='mainframe'><span style='border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>上一页</span></a>";
				echo "<a href='yitui.php?pgnum=".($pgnum+1)."' target='mainframe'><span style='margin-left:6rem;border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>下一页</span></a>";
			}
			echo "</p>";
?>
	</div>
	<div>
        <table class="first-list1" border="1" cellspacing="0" cellpadding="0">
                    	<tr>
                        	<th style="width:280px;" align="center">订单编号</th>
                        	<th style="width:150px;" align="center">生成时间</th>
                        	<th style="width:200px;" align="center">退单理由</th>
                        	<th style="width:30px;" align="center">总价/元</th>
                        	<!-- <th style="width:80px;" align="center">配送员</th> -->
                        	<th style="width:100px;" align="center">退单顾客</th>
                        	<th style="width:240px;" align="center">收货地址</th>
                        	<th style="width:100px;" align="center">收货人电话</th>
                        	<th style="width:50px;" align="center">审批</th>
                    	</tr>
<?php
			$ordersql = "select * from w_order left join w_courier on w_courier.courier_id=w_order.order_back_courier left join w_user on w_user.user_openid=w_order.user_openid where (w_order.order_static=6) order by order_time desc limit ".($pagenum*20).",20";
			$orderult = mysqli_query($link, $ordersql);
			$ordernum = mysqli_num_rows($orderult);
			if($ordernum != 0){
				while($orderow=mysqli_fetch_array($orderult)){
					$order_no = $orderow['order_no'];
					$order_time = $orderow['order_time'];
					$order_id = $orderow['order_id'];
					$order_ttl = $orderow['order_ttl'];
					$courier_name = $orderow['courier_name'];
					$user_openid = $orderow['user_openid'];
					$user_name = $orderow['user_name'];
					$order_adrs = $orderow['order_adrs'];
					$order_phone = $orderow['order_phone'];
					$order_back_memo = $orderow['order_back_memo'];
					if($order_back_memo == ""){
						$order_back_memo = "&nbsp;";
					}
					
					echo "<tr><td align='center'>".$order_no."</td>";
					echo "<td align='center'>".date('Y-m-d h:i:s',$order_time)."</td>";
					echo "<td align='left' title='".$order_back_memo."' style='width:200px;overflow:hidden;display:block;white-space: nowrap;text-overflow: ellipsis;'>".$order_back_memo."</td>";
					echo "<td align='center'>".$order_ttl."</td>";
					echo "<td align='center'>".$courier_name."</td>";
					echo "<td align='center'>".$user_name."</td>";
					echo "<td align='left' title='".$order_adrs."' style='width:240px;overflow:hidden;display:block;white-space: nowrap;text-overflow: ellipsis;'>".$order_adrs."</td>";
					echo "<td align='center'>".$order_phone."</td>";
					echo "<td align='center'><a href='yitui.php?shenflg=2&order_id=".$order_id."'>审批</a></td></tr>";
				}
			}
			mysqli_free_result($orderult);

			echo "</table>";
			echo "<p style='margin-top:1rem;width:90%;text-align:right;padding-right:4rem;'>";
			if($pagenum == 0){
				echo "<span style='border:1px #ff7575 solid;pdding:1rem;font-size:1rem;'>上一页</span>";
				echo "<a href='yitui.php?pagenum=".($pagenum+1)."' target='mainframe'><span style='margin-left:6rem;border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>下一页</span></a>";
			}else{
				echo "<a href='yitui.php?pagenum=".($pagenum-1)."' target='mainframe'><span style='border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>上一页</span></a>";
				echo "<a href='yitui.php?pagenum=".($pagenum+1)."' target='mainframe'><span style='margin-left:6rem;border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>下一页</span></a>";
			}
			echo "</p>";
?>
        </table> 
	</div>
  </div>
</div>
         
    	<script>
		window.onload = function() {
		    var oDiv = document.getElementById("tab");
		    var oLi = oDiv.getElementsByTagName("div")[0].getElementsByTagName("li");
		    var aCon = oDiv.getElementsByTagName("div")[1].getElementsByTagName("div");
		    var timer = null;
		    for (var i = 0; i < oLi.length; i++) {
		        oLi[i].index = i;
		        oLi[i].onmousedown = function() {
		            show(this.index);
		        }
		    }
		    function show(a) {
		        index = a;
		        var alpha = 0;
		        for (var j = 0; j < oLi.length; j++) {
		            oLi[j].className = "";
		            aCon[j].className = "";
		             aCon[j].style.display = "none";
		        }
		        oLi[index].className = "cur";
		        clearInterval(timer);
		        timer = setInterval(function() {
		            aCon[index].style.display = "block";
		            clearInterval(timer);
		        },
		        5)
		    }
		}
		</script>

	</body>
</html>

