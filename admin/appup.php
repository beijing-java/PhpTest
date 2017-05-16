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
 		<div class="zhifu-contanier" style="width:100%;margin-top:-4rem;background:#fff;" >
    		<div class="weijie-list" style="width:100%; margin:0 auto;">
    			<div style="width:100%;margin-top:1rem;margin-left:1rem;padding:1rem;" align="left">
    				<img src="../images/01.png" style="margin-top:1rem;">
    				<span>app版本管理&nbsp;>>>&nbsp;上传新版本</span>
    			</div>
<?php
	echo "<div class='baobeixinxi'>";
	echo "<p style='margin-top:20px;margin-left:50px;'>第一步：上传app最新版本：</p>";
	echo "<form name='uploadfile' action='upedit.php?uptype=1' method='post' target='mainframe' enctype='multipart/form-data' ><p style='margin-top:20px;margin-left:100px;'></p>";
	echo "<p style='margin-top:20px;margin-left:100px;'>上传apk文件：<input type='file' name='apkfile' id='file' style='border:1px #d4f6f1 solid; font-size:16px; width:360px; height:24px;' /></p>";
	echo "<p style='margin-top:10px;width:100%;' align='center'><input type='submit' value='上传' style='font-size:16px; margin-top:30px; color:#FFF; width:100px; height:30px; background:#da3651; border:none;' /></p></form>";
	if(isset($_GET['editgem'])){
		$editgem = $_GET['editgem'];
		if($editgem == 1){
			echo "<form name='addform' action='upedit.php?editype=1' method='post' target='mainframe'>";
			echo "<p style='margin-top:20px;margin-left:50px;width:80%;border-top:1px #999999 solid;'>第二步：填写新版本资料:</p>";
			echo "<p style='margin-top:20px;margin-left:100px;'>版本号：<input name='app_name' type='text' value='".$_SESSION['spkname']."' readonly='readonly' style='width:200px;'></p>";
			echo "<p style='margin-top:20px;margin-left:100px;'>版本号：<input name='app_no' type='text' value='' style='width:200px;'></p>";
			echo "<p style='margin-top:20px;margin-left:100px;'>版本下载路径：<input name='app_path' type='text' readonly='readonly' value='".$_SESSION['apkpath']."' style='width:200px;'></p>";
			echo "<p style='margin-top:20px;margin-left:100px;'>更新明细：<input name='app_info' type='text' maxlength='250' value='' style='width:600px;'>*最多支持125字*</p>";
			echo "<p style='margin-top:10px;width:100%;' align='center'><input name='subgem' type='submit' value='增加' style='font-size:16px; margin-top:30px; color:#FFF; width:100px; height:30px; background:#da3651; border:none;'></p></form><br /><br /><br />";
		}
	}
?>
               </div>
              
            </div>
            
    </div>
</body>
</html>
