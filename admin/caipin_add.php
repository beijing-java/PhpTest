<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="keywords" content=""/>
		<meta name="description" content="">
		<link type="text/css" rel="stylesheet" href="css/dianpu.css">
		<title></title>
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
	<body>
 		<div class="zhifu-contanier" style="width:100%;margin-top:-3rem;background:#fff;" >
    		<div class="weijie-list" style="width:100%; margin:0 auto;">
    			<div style="width:100%;margin-top:1rem;margin-left:1rem;padding:1rem;" align="left">
    				<img src="images/01.png" style="margin-top:1rem;">
    				<span>商品管理&nbsp;>>>&nbsp;商品增加</span>
    			</div>
<?php
	echo "<div class='baobeixinxi'>";
	echo "<p style='margin-top:20px;margin-left:50px;'>第一步：上传商品图片：</p>";
	echo "<form name='uploadfile' action='caipinedit.php?uptype=1' method='post' target='mainframe' enctype='multipart/form-data' ><p style='margin-top:20px;margin-left:100px;'></p>";
	echo "<p style='margin-top:20px;margin-left:100px;'>商品封面图片：<input type='file' name='file[]' id='file' style='border:1px #d4f6f1 solid; font-size:16px; width:360px; height:24px;' /></p>";
	echo "<p style='margin-top:20px;margin-left:100px;'>商品其他图片：<input type='file' name='file[]' id='file' style='border:1px #d4f6f1 solid; font-size:16px; width:360px; height:24px;' />";
	echo "<p style='margin-top:10px;margin-left:212px;'><input type='file' name='file[]' id='file' style='border:1px #d4f6f1 solid; font-size:16px; width:360px; height:24px;' /></p>";
	echo "<p style='margin-top:10px;margin-left:212px;'><input type='file' name='file[]' id='file' style='border:1px #d4f6f1 solid; font-size:16px; width:360px; height:24px;' /></p>";
	echo "<p style='margin-top:10px;margin-left:212px;'><input type='file' name='file[]' id='file' style='border:1px #d4f6f1 solid; font-size:16px; width:360px; height:24px;' /></p>";
	echo "<p style='margin-top:10px;margin-left:212px;'><input type='file' name='file[]' id='file' style='border:1px #d4f6f1 solid; font-size:16px; width:360px; height:24px;' /></p>";
	echo "<p style='margin-top:10px;width:100%;' align='center'><input type='submit' value='上传' style='font-size:16px; margin-top:30px; color:#FFF; width:100px; height:30px; background:#da3651; border:none;' /></p></form>";
/*
	echo "<form name='uploaddtlfile' action='caipin_add.php?uptype=2' method='post' target='mainframe' enctype='multipart/form-data' >";
	echo "<p style='margin-top:20px;width:80%;margin-left:50px;border-top:1px #999999 solid;'>第二步：菜品图文介绍：<input type='file' name='dtlfile' id='file' style='border:1px #d4f6f1 solid; font-size:16px; width:360px; height:24px;' /></p>";
	echo "<p style='margin-top:10px;width:100%;' align='center'>";
	echo "<input type='submit' value='上传' style='font-size:16px; margin-top:30px; color:#FFF; width:100px; height:30px; background:#da3651; border:none;' />";
	echo "<a href='imgview.php?imgview=1' target='_blank' ><input type='button' value='图文预览' style='font-size:16px;margin-left:20px;margin-top:30px;color:#FFF;width:100px;height:30px;background:#da3651;border:none;' /></a>";
	echo "</p></form>";
*/
	if(isset($_GET['editgem'])){
		$editgem = $_GET['editgem'];
		if($editgem == 1){
			echo "<form name='addform' action='caipinedit.php?editype=1' method='post' target='mainframe'>";
			echo "<p style='margin-top:20px;margin-left:50px;width:80%;border-top:1px #999999 solid;'>第二步：填写商品资料:</p>";
			echo "<p style='margin-top:20px;margin-left:100px;'>商品名称：<input name='dish_name' type='text' value='' style='width:200px;'></p>";
			echo "<p style='margin-top:20px;margin-left:100px;'>宠物分类：<input name='dish_type' checked='checked' type='radio' value='1'>狗狗</input><input style='margin-left:3rem;' name='dish_type' type='radio' value='2'>喵星人</input><input style='margin-left:3rem;' name='dish_type' type='radio' value='3'>奇趣小宠</input><input style='margin-left:3rem;' name='dish_type' type='radio' value='4'>水族</input><input style='margin-left:3rem;' name='dish_type' type='radio' value='5'>爬虫</input></p>";
			echo "<p style='margin-top:20px;margin-left:100px;'>商品分类：<input name='dish_flavor' checked='checked' type='radio' value='1'>保健品/洗护</input><input style='margin-left:3rem;' name='dish_flavor' type='radio' value='2'>零食</input><input style='margin-left:3rem;' name='dish_flavor' type='radio' value='3'>粮仓</input><input style='margin-left:3rem;' name='dish_flavor' type='radio' value='4'>衣服/家</input></p>";
			echo "<p style='margin-top:20px;margin-left:100px;'>商品封面图片：<input name='dish_cover' type='text' readonly='readonly' value='".$_SESSION['coverpath']."' style='width:200px;'></p>";
			echo "<p style='margin-top:20px;margin-left:100px;'>商品图片：<input name='dish_image' type='text' readonly='readonly' value='".$_SESSION['imgpath']."' style='width:600px;'></p>";
			echo "<p style='margin-top:20px;margin-left:100px;'>商品价格：<input name='dish_price' style='width:70px;text-align:center;' type='text' value=''>&nbsp;/&nbsp;份</p>";
			echo "<p style='margin-top:20px;margin-left:100px;'>设定状态：<input name='dish_static' type='radio' value='0'>暂不上架</input><input style='margin-left:3rem;' name='dish_static' type='radio' value='1'>上架</input></p>";
			echo "<p style='margin-top:20px;margin-left:100px;'>商品介绍：<input name='dish_info' type='text' maxlength='250' value='' style='width:600px;'>*最多支持125字*</p>";
			echo "<p style='margin-top:10px;width:100%;' align='center'><input name='subgem' type='submit' value='增加' style='font-size:16px; margin-top:30px; color:#FFF; width:100px; height:30px; background:#da3651; border:none;'></p></form><br /><br /><br />";
		}
		if($editgem == 2){
			$dish_id = $_GET['dish_id'];
			$caisql = "select * from w_dish where (dish_id=".$dish_id.")";
			$cairult = mysqli_query($link, $caisql);
			$cairow = mysqli_fetch_array($cairult);
			echo "<form name='addform' action='caipinedit.php?editype=2&dish_id=".$dish_id."' method='post' target='mainframe'>";
			echo "<p style='margin-top:20px;margin-left:50px;width:80%;border-top:1px #999999 solid;'>第二步：修改商品资料:</p>";
			echo "<p style='margin-top:20px;margin-left:100px;'>商品名称：<input name='dish_name' type='text' value='".$cairow['dish_name']."' style='width:200px;'></p>";
			switch($cairow['class_id']){
				case 1:
				break;
				case :
				break;
				case 1:
				break;
				case 1:
				break;
				case 1:
				break;
				case 1:
				break;
			}
			if($cairow['class_id'] == 1){
				echo "<p style='margin-top:20px;margin-left:100px;'>宠物分类：<input name='dish_type' checked='checked' type='radio' value='1'>狗狗</input><input style='margin-left:3rem;' name='dish_type' type='radio' value='2'>喵星人</input><input style='margin-left:3rem;' name='dish_type' type='radio' value='3'>奇趣小宠</input><input style='margin-left:3rem;' name='dish_type' type='radio' value='4'>水族</input><input style='margin-left:3rem;' name='dish_type' type='radio' value='5'>爬虫</input></p>";
			}else{
				echo "<p style='margin-top:20px;margin-left:100px;'>宠物分类：<input name='dish_type' checked='checked' type='radio' value='1'>狗狗</input><input style='margin-left:3rem;' name='dish_type' type='radio' value='2'>喵星人</input><input style='margin-left:3rem;' name='dish_type' type='radio' value='3'>奇趣小宠</input><input style='margin-left:3rem;' name='dish_type' type='radio' value='4'>水族</input><input style='margin-left:3rem;' name='dish_type' type='radio' value='5'>爬虫</input></p>";
			}
			if($cairow['dish_flavor'] == 1){
				echo "<p style='margin-top:20px;margin-left:100px;'>商品分类：<input name='dish_flavor' checked='checked' type='radio' value='1'>保健品/洗护</input><input style='margin-left:3rem;' name='dish_flavor' type='radio' value='2'>零食</input><input style='margin-left:3rem;' name='dish_flavor' type='radio' value='3'>粮仓</input><input style='margin-left:3rem;' name='dish_flavor' type='radio' value='4'>衣服/家</input></p>";
			}else{
				echo "<p style='margin-top:20px;margin-left:100px;'>商品分类：<input name='dish_flavor' checked='checked' type='radio' value='1'>保健品/洗护</input><input style='margin-left:3rem;' name='dish_flavor' type='radio' value='2'>零食</input><input style='margin-left:3rem;' name='dish_flavor' type='radio' value='3'>粮仓</input><input style='margin-left:3rem;' name='dish_flavor' type='radio' value='4'>衣服/家</input></p>";
			}
			echo "<p style='margin-top:20px;margin-left:100px;'>商品封面图片：<input name='dish_cover' type='text' readonly='readonly' value='".$cairow['dish_cover']."' style='width:200px;'></p>";
			echo "<p style='margin-top:20px;margin-left:100px;'>商品图片：<input name='dish_image' type='text' readonly='readonly' value='".$cairow['dish_image']."' style='width:600px;'></p>";
			echo "<p style='margin-top:20px;margin-left:100px;'>商品价格：<input style='width:70px;text-align:center;' name='dish_price' type='text' value='".$cairow['dish_price']."'>&nbsp;/&nbsp;份（必须是数字）</p>";
			if($cairow['dish_static'] == 0){
				echo "<p style='margin-top:20px;margin-left:100px;'>设定状态：<input name='dish_static' checked='checked' type='radio' value='0'>暂不上架</input><input style='margin-left:3rem;' name='dish_static' type='radio' value='1'>上架</input></p>";
			}else{
				if($cairow['dish_static'] == 1){
					echo "<p style='margin-top:20px;margin-left:100px;'>设定状态：<input name='dish_static' type='radio' value='0'>暂不上架</input><input style='margin-left:3rem;' name='dish_static' checked='checked' type='radio' value='1'>上架</input></p>";
				}else{
					echo "<p style='margin-top:20px;margin-left:100px;'>设定状态：<input name='dish_static' type='radio' value='0'>暂不上架</input><input style='margin-left:3rem;' name='dish_static' type='radio' value='1'>上架</input><input style='margin-left:3rem;' name='dish_static' checked='checked' type='radio' value='2'>已下架</input></p>";
				}
			}
			echo "<p style='margin-top:20px;margin-left:100px;'>商品介绍：<input name='dish_info' type='text' maxlength='250' value='".$cairow['dish_info']."' style='width:600px;'>&nbsp;&nbsp;&nbsp;&nbsp;*最多支持125字*</p>";
			echo "<p style='margin-top:10px;width:100%;' align='center'><input name='subgem' type='submit' value='修改' style='font-size:16px; margin-top:30px; color:#FFF; width:100px; height:30px; background:#da3651; border:none;'></p></form><br /><br /><br />";
		}
	}
?>
<!--                <div class="more clearfix">
                	<ul id="filter-list" style="float: left;margin: 0;padding: 18px 0;font-size: 16px; color:#757575;line-height: 1.25;">
                    	<li style="float:left; width:110px; height:20px; border-right:1px #e0e0e0 solid;" id="first active"><a href="#" data-type="0" data-stat-id="89d882413195fd4c" style="color: #ff6700;" >菜品添加</a></li>       
                   	</ul>
                </div>
            </div>
            <div  class="add" style=" width:850px; height:70px; border-bottom:1px #d8d8d8 solid;">
               	<img src="images/tu６.png" style="">
                <p style="font-size:26px; color:#6b6b6b; width:140px; height:40px; margin:-42px 0 0 60px;">添加图片</p>
            </div>
            <div class="add-infor" style="width:720px; height:100px;">
            	<div style="float:left;">
                	<input id="txt1" type="text" autocomplete="on" maxlength="10" min="2" placeholder="菜品名称" style="width:140px; height:28px; margin-top:50px; margin-right:8px;" />
                	<input id="txt1" type="text" autocomplete="on" maxlength="8" min="1" placeholder="菜品价格（元）" style="width:120px; height:28px; margin-top:50px; margin-right:8px;" />
                	<input id="txt1" type="text" autocomplete="on" maxlength="20" min="2" placeholder="备注信息" style="width:296px; height:28px; margin-top:50px;" />
                </div>
               <p style=" float:right;width:100px; height:32px; line-height:30px; text-align:center;background:#e6631b; font-size:14px; color:#FFF; margin-top:50px;">添加菜品</p>
               <div style="width:600px;">
                    <input id="txt1" type="text" autocomplete="on" maxlength="100" min="2" placeholder="菜品描述" style="width:420px; height:120px; margin-top:30px; " />
                    <p style=" float:right;width:88px; height:40px; line-height:40px; text-align:center;background:#2ca53b; font-size:14px; color:#FFF; margin-top:116px;">确定</p>
               </div>
-->
                
                   
               </div>
              
            </div>
            
    </div>
</body>
</html>
