<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="keywords" content=""/>
		<meta name="description" content="">
		<link type="text/css" rel="stylesheet" href="css/Business.css">
		<title></title>
		<?php require '../db/dblink.php'; ?>
	</head>
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
	</style>
<?php
	session_start();
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		$user_name = $_SESSION['user_name'];
	}else{
		echo "<script>window.location.href='load.php'</script>";
	}
?>
	<body>
 		<div class="zhifu-contanier" style="width:100%;margin-top:-3rem;background:#fff;" >
    		<div class="weijie-list" style="width:100%; margin:0 auto;">
    			<div style="width:100%;margin-top:1rem;margin-left:1rem;padding:1rem;" align="left">
    				<img src="images/01.png" style="margin-top:1rem;">
    				<span>配送员管理&nbsp>>>&nbsp配送员浏览</span>
    			</div>
<?php
	if(isset($_GET['c_id'])){
		$c_id = $_GET['c_id'];
		$delpsy = "delete from w_courier where (courier_id=".$c_id.")";
		$delpsyrult = mysqli_query($link, $delpsy);
		if($delpsyrult){
			echo "<script>window.alert('删除成功！')</script>";
		}else{
			echo "<script>window.alert('操作失误，请重新操作！')</script>";
		}
	}
?>
                <div class="lidt-infor" style="margin-left:1rem;">
               		<table class="first-list" border="0" cellspacing="0" cellpadding="0">
                    	<tr>
                    		<th style='width:50px;' align="center">配送员ID</th>
                    		<th style='width:100px;' align="center">姓名</th>
                    		<th style='width:50px;' align="center">编号</th>
                            <th style='width:100px;' align="center">出生日期</th>
                            <th style='width:150px;' align="center">身份证号码</th>
                        	<th style='width:100px;' align="center">注册时间</th>
                        	<th style='width:100px;' align="center">手机号</th>
                        	<th style='width:100px;' align="center">登录密码</th>
                        	<th style='width:200px;' align="center">负责区域</th>
                        	<th style='width:100px;' align="center">操作</th>
                    	</tr>
                    	<tr>
                    		<td style='width:50px;' align="center">123</td>
                    		<td style='width:100px;' align="center">三炮</td>
                    		<td style='width:50px;' align="center">007</td>
                            <td style='width:100px;' align="center">1995/05/02</td>
                            <td style='width:150px;' align="center">126374829033384</td>
                        	<td style='width:100px;' align="center">2016/03/09</td>
                        	<td style='width:100px;' align="center">13425637283</td>
                        	<td style='width:100px;' align="center">123</td>
                        	<td style='width:200px;' align="center">裕华区</td>
                        	<td style='width:100px;' align="center">操作</td>
                    	</tr>
<?php
	$psysql = "select * from w_courier";
	$psyrult = mysqli_query($link, $psysql);
	while ($psyrow=mysqli_fetch_array($psyrult)){
		$c_id = $psyrow['courier_id'];
		$c_name = $psyrow['courier_name'];
		$c_cardid = $psyrow['courier_cardid'];
		$c_birsday = $psyrow['courier_birsday'];
		$c_num = $psyrow['courier_num'];
		$c_regtime = $psyrow['courier_regtime'];
		$c_phone = $psyrow['courier_phone'];
		$c_pwd = $psyrow['courier_pwd'];
		$c_area = $psyrow['courier_area'];
		echo "<tr><td align='center'>".$c_id."</td>";
		echo "<td align='center'>".$c_name."</td>";
		echo "<td align='center'>".$c_num."</td>";
		echo "<td align='center'>".$c_birsday."</td>";
		echo "<td align='center'>".$c_cardid."</td>";
		if($c_regtime == ""){
			echo "<td></td>";
		}else{
			echo "<td align='center'>".date('Y-m-d',$c_regtime)."</td>";
		}
		echo "<td align='center'>".$c_phone."</td>";
		echo "<td align='center'>".$c_pwd."</td>";
		echo "<td align='center'></td>";
		echo "<td align='center'><a href='psy_add.php?c_id=".$c_id."' target='mainframe'>编辑</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href='psy.php?c_id=".$c_id."' target='mainframe'>删除</a></td></tr>";
	}
?>
                	</table> 
                </div> 
        	</div>
    	</div>
	</body>
</html>

                    	

