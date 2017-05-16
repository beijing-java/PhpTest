<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href="css/Business.css">
		<title></title>
		<style type="text/css">
			.title{
				margin-top:1.5rem;
			}
			#dingdan li{
				width:65%;
				margin-left:1.5rem;
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
?>
	<body>
		<div class="Business-container" style="width:100%; height:100%; margin:0 auto; background:#f5f5f5;">
    		<div style="width:100%; height:80px;background:#fff;line-height:80px;" align="center">
        		<div class="Business-nav-infor" style="width:1200px; height:80px; margin:0 auto;">
        	   		<p style="width:100%;">
            			<!-- <img src="../img/wine.png" style="float:left;margin-top:5px;"> -->
            	   		<span style="font-size:24px;color:#467CA2;float:left;margin-top:0rem;">欢迎使用后台管理系统</span>
                   		<span style="font-size:14px; color:#467CA2; float:right;margin-top:0rem;">您好，<?php echo $user_name; ?></span>
               		</p>
            	</div>
        	</div>
        	<div class="Business-main" style="width:100%; height:auto;" align="center">
        		<div class="Business-main-infor" style="width:80%; height:900px; margin:0 auto;margin-top:2rem;">
            		<div class="leftside" style="width:200px; height:900px; background:#FFF;float:left;padding-left:2rem;" align="left">
            			<p style='height:4rem;border:1px #d0d0d0 solid;width:83%;margin-top:1rem;background:#f0f0f0;'></p>
            			<p class="title">客户管理</p>
                       	<ul id="dingdan" style="font-size:14px;color:#757575; ">
                           	<li><a href="guke.php" target="mainframe">|—客户浏览</a></li>
                       	</ul>
                       	
                        <p class="title">商品管理</p>
                    	<ul id="dingdan" style="font-size:14px; color:#757575;">
                  			<li><a href="caipin_add.php" target="mainframe" >|—商品添加</a></li>
                            <li><a href="caipin.php" target="mainframe" >|—基础信息维护</a></li>
              			</ul>
              			<p class="title">订单管理</a></p>
                        <ul id="dingdan" style="font-size:14px; color:#757575; ">
                            <li><a href="weijie.php" target="mainframe">|—未接订单</a></li>
                            <li><a href="yijie.php" target="mainframe" >|—已接订单</a></li>
                            <li><a href="yitui.php" target="mainframe" >|—已退订单</a></li>
                            <li><a href="yiwanch.php" target="mainframe" >|—已完成订单</a></li>
                        </ul>
                        <!-- <p class="title">提现申请</p>
                        <ul id="dingdan" style="font-size:14px;color:#757575; ">
                            <li><a href="tixian.php?cash_static=0" target="mainframe">|—未申请/通过申请</a></li>
                            <li><a href="tixian.php?cash_static=2" target="mainframe">|—已通过申请</a></li>
                        </ul> -->
                       
                        <p style='height:4rem;border:1px #d0d0d0 solid;width:83%;margin-top:11.5rem;background:#f0f0f0;'></p>
 <!--                        	<div class="guke">
                            	 <div class="box-hd" style="font-size:16px; color:#333; padding-top:40px; padding-bottom:26px;">
                                	<p class="title">客户管理</p>
                            	</div>
                            	<ul id="dingdan" style=" font-size:14px;color:#757575; ">
                                	<li style="width:90px;"><a href="guke.php" target="mainframe">客户浏览</a></li>
                            	</ul>
                        	</div>
                    		<div class="peisong">
                             	<div class="box-hd" style="font-size:16px; color:#333; padding-top:40px; padding-bottom:26px;">
                                	<p class="title">配送员管理</p>
                            	</div>
                            	<ul id="dingdan" style="  font-size:14px; color:#757575;">
                                	<li style="width:90px;"><a href="psy_add.php" target="mainframe">增加配送员</a></li>
                                	<li style="width:90px; padding-top:12px;"><a href="psy.php" target="mainframe" >查看信息</a></li>
                            	</ul>
                        	</div>
                        <div id="caipin">
                        	 <div id="box-hd" style="font-size:16px; color:#333; padding-top:40px; padding-bottom:26px;">
                            	<p class="title">菜品管理</p>
                        	</div>
                    		<ul id="dingdan" style="  font-size:14px; color:#757575;">
                  				<li style="width:90px; padding-top:12px;"><a href="caipin_add.php" target="mainframe" >菜品添加</a></li>
                            	<li style="width:90px;  padding-top:12px;"><a href="caipin.php" target="mainframe" >基础信息维护</a></li>
              				</ul>
                        </div>
                        <div align="center">
                             <div style="font-size:16px; color:#333; padding-top:50px; padding-bottom:26px;">
                                <p class="title">订单管理</a></p>
                            </div>
                            <ul id="dingdan" style=" text-align:center;  font-size:14px; color:#757575; ">
                                <li style="width:90px; padding-top:12px;padding-left:4.5rem;"><a href="weijie.php" target="mainframe">未接订单</a></li>
                                <li style="width:90px; padding-top:12px;padding-left:4.5rem;"><a href="yijie.php" target="mainframe" >已接订单</a></li>
                                <li style="width:90px;  padding-top:12px;padding-left:4.5rem;"><a href="yitui.php" target="mainframe" >已退订单</a></li>
                                <li style="width:90px;  padding-top:12px;padding-left:4.5rem;"><a href="yiwanch.php" target="mainframe" >已完成订单</a></li>
                            </ul>
                        </div>
                        <div class="tixian">
                                 <div class="box-hd" style="font-size:16px; color:#333; padding-top:40px; padding-bottom:26px;">
                                    <p class="title">提现申请</p>
                                </div>
                                <ul id="dingdan" style=" font-size:14px;color:#757575; ">
                                    <li style="width:90px;"><a href="tixian.php?cash_static=0" target="mainframe">未申请/通过申请</a></li>
                                    <li style="width:90px;"><a href="tixian.php?cash_static=2" target="mainframe">已通过申请</a></li>
                                </ul>
                        </div> -->
                </div>
                <div class="rightside" style="float:right; width:84%; height:100%; background:fff;">
                	<iframe name="mainframe" src="guke.php" scrolling="no" frameborder="no" style="width:100%; height:100%;"></iframe>
                </div>
            </div>
        </div>
        <div class="Business-footer"></div>
    </div>
</body>
</html>
