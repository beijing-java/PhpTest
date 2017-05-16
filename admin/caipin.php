<!doctype html>
<html>
	<head>
		<!-- <meta charset="utf-8"> -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content=""/>
		<meta name="description" content="">
		<link type="text/css" rel="stylesheet" href="css/Business.css">
		<title></title>
		<?php require '../db/dblink.php'; ?>
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
            height:30px;
            line-height:30px;
            background:#f6f6f6;
            border-bottom:1px #ececec solid;border-top:1px #ececec solid;
            font-size:12px;
            text-align:center; 
        }
        .first-list tr{
            color:#999999; 
            border-left:1px #ececec solid;
            height:30px;
        }
        .first-list th{
            color:#999999;
            border-right:1px #ececec solid;
            width:80px;
            height: 32px;
        }
        .first-list th:first-child,td:first-child{border-left:1px #ececec solid; }
        .first-list td{
            color:#999999;
            border-right:1px #ececec solid;
            width:80px;
            background: #fff;
        }
        .search-text{
            position: absolute;
            top: 0;right: 41px;
            z-index: 1;
            width: 189px;height: 40px;
            padding: 0 15px;
            border: 1px solid #e0e0e0;
            font-size: 12px;
            line-height: 40px;
            outline: 0;
            color: #757575;
        }
    </style>
	<body>
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
 		<div class="zhifu-contanier" style="width:100%;margin-top:-3rem;background:#fff;" >
    		<div class="weijie-list" style="width:100%; margin:0 auto;">
    			<div style="width:100%;margin-top:2rem;margin-left:1rem;padding:1rem;" align="left">
    				<img src="images/01.png" >
    				<span>商品管理&nbsp>>>&nbsp商品浏览</span>
    			</div>
<?php
	if(isset($_GET['editcai'])){
		$editcai = $_GET['editcai'];
		$dish_id = $_GET['dish_id'];
		if($editcai == 1){
			$caisql = "update w_dish set dish_static=".$editcai.",dish_uptime='".time()."' where (dish_id=".$dish_id.")";
		}else{
			if($editcai == 2){
				$caisql = "update w_dish set dish_static=".$editcai.",dish_downtime='".time()."' where (dish_id=".$dish_id.")";
			}else{
				if($editcai == 3){
					$caisql = "delete from w_dish where (dish_id=".$dish_id.")";
				}
			}
		}
		$cairult = mysqli_query($link, $caisql);
		if($cairult){
			if($editcai == 1){
				echo "<script>window.alert('商品上架成功！')</script>";
			}else{
				if($editcai == 2){
					echo "<script>window.alert('商品下架成功！')</script>";
				}else{
					if($editcai == 3){
						echo "<script>window.alert('商品删除成功！')</script>";
					}
				}
			}
		}
	}
?>
                <div class="lidt-infor" style="margin-left:1rem;">
                <script>
                function selectAll(){
                 var checklist = document.getElementsByName ("selected");
                   if(document.getElementById("controlAll").checked)
                   {
                   for(var i=0;i<checklist.length;i++)
                   {
                      checklist[i].checked = 1;
                   } 
                 }else{
                  for(var j=0;j<checklist.length;j++)
                  {
                     checklist[j].checked = 0;
                  }
                 }
                }
                </script>
                	<table class="first-list" border="1" cellspacing="0" cellpadding="0">
                    	<tr>
                        	<th style="width:20px" align="center">商品ID</th>
                        	<th style="width:120px" align="center">商品名称</th>
<!--                         	<th>封面图片</th>
                        	<th>介绍图片</th> -->
                        	<th style="width:300px;" align="center">商品介绍</th>
                        	<th style="width:40px" align="center">定价</th>
                        	<th style="width:100px" align="center">上架时间</th>
                        	<th style="width:100px" align="center">下架时间</th>
                        	<th style="width:50px" align="center">宠物分类</th>
                        	<th style="width:50px" align="center">商品分类</th>
                        	<th style="width:50px" align="center">状态</th>
                        	<th style="width:140px" align="center">操作&nbsp<input onclick="selectAll()" type="checkbox"   name="controlAll" style="controlAll" id="controlAll"/>全选<br></th> 
                    	</tr>
<?php
    $dishsql = "select * from w_dish order by dish_id asc limit ".($pagenum*20).",20";
    $dishrult = mysqli_query($link, $dishsql);
    while($dishrow=mysqli_fetch_array($dishrult)){
    	$dish_id = $dishrow['dish_id'];
    	$dish_name = $dishrow['dish_name'];
    	$dish_info = $dishrow['dish_info'];
    	$dish_price = $dishrow['dish_price'];
    	$dish_static = $dishrow['dish_static'];
    	$dish_uptime = $dishrow['dish_uptime'];
    	$dish_downtime = $dishrow['dish_downtime'];
    	$dish_type = $dishrow['dish_type'];
    	$dish_flavor = $dishrow['dish_flavor'];
    	 
        echo "<tr><td align='center'>".$dish_id."</td>";
        echo "<td align='center'>".$dish_name."</td>";
        echo "<td align='left' title='".$dish_info."' style='width:300px;height:30px;overflow:hidden;display:block;'>".$dish_info."</td>";
        echo "<td align='center'>".$dish_price."</td>";
        if($dish_uptime == ""){
        	echo "<td align='center'></td>";
        }else {
        	echo "<td align='center'>".date('Y-m-d',$dish_uptime)."</td>";
        }
        if($dish_downtime == ""){
        	echo "<td align='center'></td>";
        }else {
        	echo "<td align='center'>".date('Y-m-d',$dish_downtime)."</td>";
        }
        if($dish_type == 1){
        	echo "<td align='center'>狗狗</td>";
        }else if($dish_type == 2){
        	echo "<td align='center'>喵星人</td>";
        }else if($dish_type == 3){
            echo "<td align='center'>奇趣小宠</td>";
        }else if($dish_type == 4){
            echo "<td align='center'>水族</td>";
        }else if($dish_type == 5){
            echo "<td align='center'>爬虫</td>";
        }
        if($dish_flavor == 1){
        	echo "<td align='center'>保健品/洗护</td>";
        }else if($dish_flavor == 2){
        	echo "<td align='center'>零食</td>";
        }else if($dish_flavor == 3){
            echo "<td align='center'>粮仓</td>";
        }else if($dish_flavor == 4){
            echo "<td align='center'>衣服/家</td>";
        }
        
        switch ($dish_static){
        	case '0':echo "<td align='center'>未上架</td>";
        		echo "<td align='center'><a href='caipin_add.php?editgem=2&dish_id=".$dish_id."' target='mainframe'>详情</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href='caipin.php?editcai=1&dish_id=".$dish_id."' target='mainframe'>上架</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href='caipin.php?editcai=3&dish_id=".$dish_id."' target='mainframe'>删除</a></td></tr>";
        		break;
        	case '1':echo "<td align='center'>已上架</td>";
        		echo "<td align='center'><a href='caipin_add.php?editgem=2&dish_id=".$dish_id."' target='mainframe'>详情</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href='caipin.php?editcai=2&dish_id=".$dish_id."' target='mainframe'>下架</a>&nbsp<input type='checkbox' name='selected'/></td></tr>";
        		break;
        	case '2':echo "<td align='center'>已下架</td>";
        		echo "<td align='center'><a href='caipin_add.php?editgem=2&dish_id=".$dish_id."' target='mainframe'>详情</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href='caipin.php?editcai=1&dish_id=".$dish_id."' target='mainframe'>重新上架</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href='caipin.php?editcai=3&dish_id=".$dish_id."' target='mainframe'>删除</a>&nbsp<input type='checkbox' name='selected'/></td></tr>";
        		break;
        	default:break;
        }
    }
    
	echo "</table>";
	echo "<p style='margin-top:1rem;width:90%;text-align:right;padding-right:4rem;'>";
	if($pagenum == 0){
		echo "<span style='border:1px #ff7575 solid;pdding:1rem;font-size:1rem;'>上一页</span>";
		echo "<a href='caipin.php?pagenum=".($pagenum+1)."' target='mainframe'><span style='margin-left:6rem;border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>下一页</span></a>";
	}else{
		echo "<a href='caipin.php?pagenum=".($pagenum-1)."' target='mainframe'><span style='border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>上一页</span></a>";
		echo "<a href='caipin.php?pagenum=".($pagenum+1)."' target='mainframe'><span style='margin-left:6rem;border:1px #ff7575 solid;font-size:1rem;pdding:1rem;'>下一页</span></a>";
	}
	echo "</p>";
?>
                </div> 
        	</div>
    	</div>
	</body>
</html>
                           

