<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="keywords" content="叮咚狗火锅，叮咚狗火锅卖，叮咚狗火锅外卖网，外卖订餐，网上订餐外卖，快餐外卖，外卖网，外卖；"/>
		<meta name="description" content="叮咚狗火锅外卖打造的一个专业外卖服务平台，覆盖众多优质外卖商家，提供方便快捷的网上外卖订餐服务。">
		<link type="text/css" rel="stylesheet" href="css/dianpu.css">
		<title>增加配送员</title>
		<?php require '../db/dblink.php'; ?>
	</head>
<?php
	session_start();
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		$user_name = $_SESSION['user_name'];
	}else{
		echo "<script>window.location.href='load.php'</script>";
	}
?>
	<style type="text/css">
		.dianpu-container{width:950px; height:800px; background:#FFF; margin-top:16px;}
		#filter-list{float: left;margin: 0;padding: 18px 0;font-size: 16px; color:#757575;line-height: 1.25;}
    	.title{padding-top: 20px;font-size: 30px;font-weight: 400;line-height: 68px;color: #757575;}
	</style>
	<body>
		<div class="zhifu-contanier" style="width:100%;margin-top:-3rem;background:#fff;" >
    		<div class="weijie-list" style="width:100%; margin:0 auto;">
    			<div style="width:100%;margin-top:1rem;margin-left:1rem;padding:1rem;" align="left">
    				<img src="images/01.png" style="margin-top:1rem;">
    				<span>配送员管理&nbsp;>>>&nbsp;增加配送员</span>
    			</div>
<?php
	if(isset($_GET['c_id'])){
		$c_id = $_GET['c_id'];
		$editsql = "select * from w_courier where (courier_id='".$c_id."')";
		$editrult = mysqli_query($link, $editsql);
		$editrow = mysqli_fetch_array($editrult);
		echo "<div class='lidt-infor' style='margin-left:1rem;'>";
		echo "<form name='editform' action='psy_add.php' method='post' target='mainframe'>";
		echo "<table width='100%' border='0' cellpadding='0' cellspacing='1' class='grid' height='250' style='margin-top:10px;'>";
		echo "<tr><td style='height:50px;width:170px;padding-left:20px;'>配送员姓名：</td>";
		echo "<td><input name='courier_name' type='text' value='".$editrow['courier_name']."'></td></tr>";
		echo "<tr><td style='height:50px;width:170px;padding-left:20px;'>配送员出生日期：</td>";
		echo "<td><input name='courier_birsday' type='date' value='".$editrow['courier_birsday']."'></td></tr>";
		echo "<tr><td style='height:50px;width:170px;padding-left:20px;'>配送员身份证号码：</td>";
		echo "<td><input name='courier_cardid' style='width:300px' type='text' value='".$editrow['courier_cardid']."'></td></tr>";
		echo "<tr><td style='height:50px;width:170px;padding-left:20px;'>配送员编号：</td>";
		echo "<td><input name='courier_num' type='text' value='".$editrow['courier_num']."'></td></tr>";
		echo "<tr><td style='height:50px;width:170px;padding-left:20px;'>配送员手机号：</td>";
		echo "<td><input name='courier_phone' type='number' value='".$editrow['courier_phone']."'></td></tr>";
		echo "<tr><td style='height:50px;width:170px;padding-left:20px;'>配送员密码：</td>";
		echo "<td><input name='courier_pwd' type='text' value='".$editrow['courier_pwd']."'></td></tr>";
		echo "<tr><td colspan='2' style='float:right;'>";
		echo "<input name='psybtn' type='submit' style='height: 30px;width:60px;margin-left:20px;background: #e6631b;border: none;color: #fff;' value='确定'</td></tr>";
		echo "<input name='courier_id' type='hidden' value='".$c_id."'>";
		echo "</table></form></div>";
	}else{
?>
                <div class="lidt-infor" style="margin-left:1rem;">
        			<form name="psyform" action="psy_add.php" method="post" target="mainframe">
            			<table width="100%" border="0" cellpadding="0" cellspacing="1"  class="grid" height="250" style="margin-top:10px;">
                        	<tr>
                            	<td style="height:50px; width: 170px;padding-left: 20px;">配送员姓名：</td>
                                <td><input name="courier_name" type="text" value=""></input></td>
                            </tr>
                            <tr>
                            	<td style="width:170px; height: 50px;padding-left: 20px;">配送员出生日期：</td>
                                <td><input name="courier_birsday" type="date" value=""></input></td>
                            </tr>
                            <tr>
                            	<td style="width:170px; height: 50px;padding-left: 20px;">配送员身份证号码：</td>
                                <td><input style="width: 300px;" name="courier_cardid" type="text" value=""></input></td>
                            </tr>
                            <tr>
                            	<td style="width:170px; height: 50px;padding-left: 20px;">配送员编号：</td>
                                <td><input name="courier_num" type="text" value=""></input></td>
                            </tr>
                            <tr>
                                <td style="width:170px; height: 50px;padding-left: 20px;">配送员手机号：</td>
                                <td><input name="courier_phone" type="number" value=""></input></td>
                            </tr>
                            <tr>
                                <td style="width: 170px; height: 50px;padding-left: 20px;">登录密码：</td>
                                <td><input name="courier_pwd" type="text" value="默认密码为手机号" readonly="readonly"></input></td>
                            </tr>
<!--                             <tr>
                            	<td style="width: 170px; height: 50px;padding-left: 20px;">配送员负责区域：</td>
                                <td><inpu name="courier_area" type="text" value=""></input></td>
                            </tr>
                            <tr>
                                <td style="width: 170px; height: 50px;padding-left: 20px;">配送员负责区域编号：</td>
                                <td><input></input></td>
                            </tr>
 -->
                            <tr>
                                <td colspan="2" style="float: right;">
                                	<input name="psybtn" type="submit" style="height: 30px;width:60px;margin-left:20px;background: #e6631b;border: none;color: #fff;" value="添加"></input>
                                </td>
                            </tr>
                        </table>
        			</form>
        		</div>
<?php
	}
	if(isset($_POST['courier_id'])){//编辑资料
		$c_id = $_POST['courier_id'];
		$c_name = trim($_POST['courier_name']);
		$c_num = trim($_POST['courier_num']);
		$c_phone = trim($_POST['courier_phone']);
		$c_birsday = trim($_POST['courier_birsday']);
		$c_cardid = trim($_POST['courier_cardid']);
		$c_pwd = trim($_POST['courier_pwd']);
		if(($c_name == "") or ($c_num == "") or ($c_phone == "") or ($c_birsday == "") or ($c_cardid == "")){
			echo "<script>window.alert('所有信息都不能为空，请重新填写！')</script>";
		}else{
			if(preg_match("/^1[34578]{1}\d{9}$/",$c_phone)){
				$psysql = "update w_courier set courier_name='".$c_name."',courier_cardid='".$c_cardid."',courier_birsday='".$c_birsday."',courier_num='".$c_num."',courier_phone='".$c_phone."',courier_pwd='".$c_pwd."' where (courier_id=".$c_id.")";
//				$psysql = "insert into w_courier (courier_name,courier_cardid,courier_birsday,courier_num,courier_regtime,courier_phone,courier_pwd) values('".$c_name."','".$c_cardid."','".$c_birsday."','".$c_num."','".$regtime."','".$c_phone."','".$c_phone."')";
				$psyrult = mysqli_query($link, $psysql);
				if($psyrult){
					echo "<script>window.alert('配送员资料修改成功！')</script>";
				}else{
					echo "<script>window.alert('操作失误，请重新操作！')</script>";
				}
			}else{
				echo "<script>window.alert('请填写正确的手机号码！')</script>";
			}
		}
	}else{//新增
		if(isset($_POST['courier_name'])){
			$c_name = trim($_POST['courier_name']);
			$c_num = trim($_POST['courier_num']);
			$c_phone = trim($_POST['courier_phone']);
			$c_birsday = trim($_POST['courier_birsday']);
			$c_cardid = trim($_POST['courier_cardid']);
			if(($c_name == "") or ($c_num == "") or ($c_phone == "") or ($c_birsday == "") or ($c_cardid == "")){
				echo "<script>window.alert('所有信息都不能为空，请重新填写！')</script>";
			}else{
				if(preg_match("/^1[34578]{1}\d{9}$/",$c_phone)){
					$regtime = time();
					$psysql = "insert into w_courier (courier_name,courier_cardid,courier_birsday,courier_num,courier_regtime,courier_phone,courier_pwd) values('".$c_name."','".$c_cardid."','".$c_birsday."','".$c_num."','".$regtime."','".$c_phone."','".$c_phone."')";
					$psyrult = mysqli_query($link, $psysql);
					if($psyrult){
						echo "<script>window.alert('配送员添加成功！')</script>";
					}else{
						echo "<script>window.alert('操作失误，请重新操作！')</script>";
					}
				}else{
					echo "<script>window.alert('请填写正确的手机号码！')</script>";
				}
			}
		}
	}
?>
            </div>
    	</div>
	</body>
</html>
