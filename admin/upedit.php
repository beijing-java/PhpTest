<?php  require '../db/dblink.php'; ?>
<meta charset="utf-8">
<?php
    session_start();
	if(isset($_GET['uptype'])){
		$uptype = $_GET['uptype'];
		if($uptype == 1){
			//print_r($_FILES["upfile"]);
			if ($_FILES["apkfile"]["error"] > 0){
				$msg = "error:". $_FILES["apkfile"]["error"] . "文件上传错误，请重新上传！";
      			if(isset($_SESSION['apkpath'])){
      				$_SESSION['apkpath'] = "";
      			}
				echo "<script>window.alert('".$msg."')</script>";
				echo "<script>window.location.href='appup.php'</script>";
			}else{
				if (file_exists("../download/" . $_FILES["apkfile"]["name"])){
      				$msg = $_FILES["apkfile"]["name"] . "文件已存在！";
      				if(isset($_SESSION['apkpath'])){
      					$_SESSION['apkpath'] = "";
      				}
      				echo "<script>window.alert('".$msg."')</script>";
      				echo "<script>window.location.href='appup.php'</script>";
      			}else{
      				move_uploaded_file($_FILES["apkfile"]["tmp_name"],"../download/" . $_FILES["apkfile"]["name"]);
      				$spkname = $_FILES["apkfile"]["name"];
      				$_SESSION['spkname'] = $spkname;
      				$apkpath = "download/" . $_FILES["apkfile"]["name"];
      				if(!isset($_SESSION['apkpath'])){
      					$_SESSION['apkpath'] = "";
      				}
      				if($_SESSION['apkpath'] == ""){
      					$_SESSION['apkpath'] = $apkpath;
      				}else{
      					$_SESSION['apkpath'] = $_SESSION['apkpath'].";".$apkpath;
      				}
      				echo "<script>window.alert('文件上传成功！')</script>";
      				echo "<script>window.location.href='appup.php?editgem=1'</script>";
   				}
			}
		}
	}else{
		if(isset($_GET['editype'])){
			$editype = $_GET['editype'];
			if($editype == '1'){
				$app_name = $_POST['app_name'];
				$app_no = trim($_POST['app_no']);
				$app_path = $_POST['app_path'];
				$app_info = trim($_POST['app_info']);
				$app_uptime = time();
				
				if($app_path == ""){
					echo "<script>window.alert('请先上传新版本程序！');</script>";
					echo "<script>window.location.href='caipin_add.php'</script>";
				}else{
					if(($app_no=="") or ($app_info=="")){
						echo "<script>window.alert('信息不能为空，请填写！');</script>";
						echo "<script>window.location.href='appup.php?editgem=1'</script>";
					}
//					$addsql = "insert into w_dish (dish_name,dish_cover,dish_image,dish_info,dish_price,dish_static,dish_uptime,dish_downtime,dish_type,dish_flavor) values('".$dish_name."','".$dish_cover."','".$dish_image."','".$dish_info."','".$dish_price."',".$dish_static.",'".time()."','',".$dish_type.",".$dish_flavor.")";
					$addsql = "insert into w_app (app_name,app_path,app_no,app_info,app_uptime) values('".$app_name."','".$app_path."','".$app_no."','".$app_info."','".$app_uptime."')";
					$addrult = mysqli_query($link, $addsql);
					if($addrult){
						$_SESSION['apkpath'] = "";
						echo "<script>window.alert('文件增加成功！');</script>";
						echo "<script>window.location.href='appup.php'</script>";
					}else{
						echo "<script>window.alert('操作失败，请重新操作！');</script>";
						echo "<script>window.location.href='appup.php?editgem=1'</script>";
					}
//					mysqli_free_result($addrult);
				}
			}
		}
	}
?>