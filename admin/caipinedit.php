<?php  require '../db/dblink.php'; ?>
<meta charset="utf-8">
<?php
    session_start();
	if(isset($_GET['uptype'])){
		$uptype = $_GET['uptype'];
		if($uptype == 1){
			//print_r($_FILES["upfile"]);
			$imgnum = 0;
			$imgpath = "";
			foreach ($_FILES["file"]["error"] as $key => $error) { 
				if ($error == UPLOAD_ERR_OK){
					$tmp_name = $_FILES["file"]["tmp_name"][$key];  
					if(file_exists("../upload/".$tmp_name)){
      					$msg = $_FILES["file"]["name"] . "文件已存在！";
      					$_SESSION['coverpath'] = "";
      					$_SESSION['imgpath'] = "";
      					echo "<script>window.alert('".$msg."')</script>";
      					echo "<script>window.location.href='caipin_add.php'</script>";
      					break;
					}else{
      					move_uploaded_file($_FILES["file"]["tmp_name"][$key],"../upload/" . $_FILES["file"]["name"][$key]);
      					if($imgnum == 0){
      						$coverpath = "upload/" . $_FILES["file"]["name"][$key];
      						$_SESSION['coverpath'] = $coverpath;
      					}else{
      						if($imgnum == 1){
      							$imgpath = "upload/" . $_FILES["file"]["name"][$key];
      						}else{
      							$imgpath = $imgpath.";"."upload/" . $_FILES["file"]["name"][$key];
      						}
      						$_SESSION['imgpath'] = $imgpath;
      					}
      					echo "<script>window.alert('图片上传成功！')</script>";
      					echo "<script>window.location.href='caipin_add.php?editgem=1'</script>";
					}
				}else{
					if($imgnum == 0){
						$msg = "error:". $_FILES["file"]["error"] . "图片上传错误，请重新上传！";
      					$_SESSION['coverpath'] = "";
      					$_SESSION['imgpath'] = "";
						echo "<script>window.alert('".$msg."')</script>";
						echo "<script>window.location.href='caipin_add.php'</script>";
						break;
					}
				}
				$imgnum = $imgnum + 1;
			}
		}else{
			if($uptype == 2){
				if ($_FILES["dtlfile"]["error"] > 0){
					$msg = "error:". $_FILES["dtlfile"]["error"] . "宝贝图文图片上传错误，请重新上传！";
      				if(isset($_SESSION['imgwrd'])){
      					$_SESSION['imgwrd'] = "";
      				}
					echo "<script>window.alert('".$msg."')</script>";
					echo "<script>window.location.href='caipin_add.php?editgem=1'</script>";
				}else{
					if (file_exists("../upload/" . $_FILES["dtlfile"]["name"])){
      					$msg = $_FILES["dtlfile"]["name"] . "文件已存在！";
      					if(isset($_SESSION['imgwrd'])){
      						$_SESSION['imgwrd'] = "";
      					}
      					echo "<script>window.alert('".$msg."')</script>";
      					echo "<script>window.location.href='caipin_add.php?editgem=1'</script>";
      				}else{
      					move_uploaded_file($_FILES["dtlfile"]["tmp_name"],"../upload/" . $_FILES["dtlfile"]["name"]);
      					$imgwrd = "upload/" . $_FILES["dtlfile"]["name"];
      					if(!isset($_SESSION['imgwrd'])){
      						$_SESSION['imgwrd'] = "";
      					}
      					if($_SESSION['imgwrd'] == ""){
      						$_SESSION['imgwrd'] = $imgwrd;
      					}else{
      						$_SESSION['imgwrd'] = $_SESSION['imgwrd'].";".$imgwrd;
      					}
      					echo "<script>window.alert('图片上传成功！')</script>";
      					echo "<script>window.location.href='caipin_add.php?editgem=1'</script>";
//      				echo "Stored in: " . "../upload/" . $_FILES["file"]["name"];
      				}
				}
			}
		}
	}else{
		if(isset($_GET['editype'])){
			$editype = $_GET['editype'];
			if($editype == '1'){
				$dish_name = trim($_POST['dish_name']);
				$dish_type = $_POST['dish_type'];
				$dish_flavor = $_POST['dish_flavor'];
				$dish_cover = $_POST['dish_cover'];
				$dish_image = $_POST['dish_image'];
				$dish_price = trim($_POST['dish_price']);
				$dish_static = $_POST['dish_static'];
				$dish_info = trim($_POST['dish_info']);
				
				if($dish_cover == ""){
					echo "<script>window.alert('请先上传宝贝图片！');</script>";
					echo "<script>window.location.href='caipin_add.php'</script>";
				}else{
					if(($dish_name=="") or ($dish_price=="")){
						echo "<script>window.alert('信息不能为空，请填写！');</script>";
						echo "<script>window.location.href='caipin_add.php?editgem=1'</script>";
					}
					$addsql = "insert into w_dish (dish_name,dish_cover,dish_image,dish_info,dish_price,dish_static,dish_uptime,dish_downtime,class_id,classx_id) values('".$dish_name."','".$dish_cover."','".$dish_image."','".$dish_info."','".$dish_price."',".$dish_static.",'".time()."','',".$dish_type.",".$dish_flavor.")";
					$addrult = mysqli_query($link, $addsql);
					if($addrult){
						$_SESSION['imgpath'] = "";
						$_SESSION['coverpath'] = "";
						$_SESSION['imgwrd'] = "";
						echo "<script>window.alert('物品增加成功！');</script>";
						echo "<script>window.location.href='caipin_add.php'</script>";
					}else{
						echo "<script>window.alert('操作失败，请重新操作！');</script>";
						echo "<script>window.location.href='caipin_add.php?editgem=1'</script>";
					}
//					mysqli_free_result($addrult);
				}
			}
			if($editype == 2){
				$dish_id = $_GET['dish_id'];
				$dish_name = trim($_POST['dish_name']);
				$dish_type = $_POST['dish_type'];
				$dish_flavor = $_POST['dish_flavor'];
				$dish_cover = $_POST['dish_cover'];
				$dish_image = $_POST['dish_image'];
				$dish_price = trim($_POST['dish_price']);
				$dish_static = $_POST['dish_static'];
				$dish_info = trim($_POST['dish_info']);
				
				if($dish_cover == ""){
					echo "<script>window.alert('请先上传宝贝图片！');</script>";
					echo "<script>window.location.href='caipin_add.php'</script>";
				}else{
					if(($dish_name=="") or ($dish_price=="")){
						echo "<script>window.alert('信息不能为空，请填写！');</script>";
						echo "<script>window.location.href='caipin_add.php?editgem=1'</script>";
					}
//					$addsql = "insert into w_dish (dish_name,dish_cover,dish_image,dish_info,dish_price,dish_static,dish_uptime,dish_downtime,class_id,classx_id) values('".$dish_name."','".$dish_cover."','".$dish_image."','".$dish_info."','".$dish_price."',".$dish_static.",'".time()."','',".$dish_type.",".$dish_flavor.")";
					$editsql = "update w_dish set dish_name='".$dish_name."',dish_cover='".$dish_cover."',dish_image='".$dish_image."',dish_info='".$dish_info."',dish_price='".$dish_price."',class_id=".$dish_type.",classx_id=".$dish_flavor." where (dish_id=".$dish_id.")";
					$addrult = mysqli_query($link, $editsql);
					if($addrult){
						$_SESSION['imgpath'] = "";
						$_SESSION['coverpath'] = "";
						$_SESSION['imgwrd'] = "";
						echo "<script>window.alert('物品修改成功！');</script>";
						echo "<script>window.location.href='caipin_add.php'</script>";
					}else{
						echo "<script>window.alert('操作失败，请重新操作！');</script>";
						echo "<script>window.location.href='caipin_add.php?editgem=1'</script>";
					}
				}
			}
		}
	}
?>