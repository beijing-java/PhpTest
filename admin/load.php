<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href="css/Business-login.css">
		<title>腾记下酒菜</title>
        <?php require '../db/dblink.php'; ?>
	</head>
	
<?php
	if (isset($_POST['username'])){
		$username = $_POST['username'];
		$passowrd = $_POST['password'];
//		$passowrd = md5($passowrd);
		if(($username == "administrator") and ($passowrd == "administrator")){
			$_SESSION['user_name'] = $username;
			session_start();
			$_SESSION['user_id'] = "admin";
			$_SESSION['user_name'] = $username;
			echo "<script>window.location.href='index.php';</script>";
		}
/*
		$loadsql = "select * from w_user where (user_name='".$username."')";
		$loadrult = mysqli_query($link, $loadsql);
		if($loadrult->num_rows == 0){
			echo "<script>window.alert('用户名或密码错误，请重新登陆！');</script>";
		}else{
			$loadrow = mysqli_fetch_array($loadrult,MYSQLI_ASSOC);
			session_start();
			$_SESSION['user_id'] = $loadrow['user_id'];
			$_SESSION['user_name'] = $loadrow['user_name'];
			$_SESSION['user_type'] = $loadrow['user_type'];
			echo "<script>window.location.href='index.php';</script>";
		}
*/
//		mysqli_free_result($loadrult);
//		$loadrult->db2_free_result(stmt)
	}
?>

	<body>
		<div class="Business-login-contanier" style="width:100%; height:970px; background:#017EC0;">
        	<div class="Business-login-main" align="center" style="width:600px; height:420px; padding-top:200px; margin:auto;">
        		<div class="Business-login-main-head" style="width:600px; height:72px; line-height:72px; background:#fff;  border-top-left-radius: 30px;border-top-right-radius: 30px;">
        			<img style="float:left;margin-left:2rem;margin-top:0.5rem;border-radius:1rem;" src="../img/wine.png">
            	</div>
            	<form name="loadform" acton="load.php" target="_self" method="post">
            	<div class="Logon Screen" align="center" style="width:600px; height:348px; background:#fafafa; margin:auto;  border-bottom-left-radius: 30px; border-bottom-right-radius: 30px;">
            		<div class="Logon Screen-infor" style="width:290px; height:210px; ">
                		<P style="font-size:24PX; color:#212433; padding-top:50px;font:Microsoft Yahei;">腾记下酒菜后台管理系统</P>
                    	<div class="user" style="width:290px; margin-top:60px;">
                    		<div class="user-infor">
                        		<div style="float:left;">
                        			<img src="images/yonghuming.png">
                    				<span style=" font-size:14px; color:#a6acb1;">&nbsp;&nbsp;用户名：</span>
                        		</div>
                        		<div style="width:186px; height:20px; border-bottom:1px #a6acb1 solid; float:right;">
                        			<input style="border:none;background:#fafafa;font-size:1rem;" name="username" type="text" vlaue=""></input>
                        		</div>
                        	</div>
                        	<div class="password-infor"  style="clear:both; padding-top:20px;" >
                        		<div style="float:left; ">
                        			<img src="images/mima.png">
                    				<span style=" font-size:14px; color:#a6acb1;">&nbsp;&nbsp;密&nbsp;&nbsp;&nbsp;&nbsp;码：</span>
                        		</div>
                        		<div style="width:186px; height:20px; border-bottom:1px #a6acb1 solid; float:right;">
                        			<input style="border:none;background:#fafafa;font-size:1rem;" name="password" type="password" vlaue=""></input>
                        		</div>
                        	</div>
                    	</div>
                	</div>
                	<div class="button">
                		<input class="button" style="border:none;width:186px;height:40px;line-height:36px;background:#017EC0;border-radius:0.3rem; margin-top:55px;color:#fff;" name="loadbtn" type="submit" value="登    录" ></input>
                	</div>
            	</div>
            	</form>
        	</div>
    	</div>
	</body>
</html>