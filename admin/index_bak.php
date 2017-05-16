<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <link type="text/css" rel="stylesheet" href="css/Business.css">
      <title>腾记下酒菜</title>
      <?php //require '../db/dblink.php'; ?>
      <style type="text/css">
        #title{
          color:#f0f0f0;
          font-size: 16px;
          margin-left: 3rem;
        }
        #ttle {
          color: #fff;
          font-size: 16px;
          margin-left: 1rem;
        }
        #ttle a {
          color: #f0f0f0;
          text-decoration:none;
          font-size: 16px;
        }
        #title a {
          color: #f0f0f0;
          text-decoration:none;
          font-size: 16px;
        }
		*{margin: 0;padding: 0}
		body{font-size: 12px;font-family: "宋体","微软雅黑";}
		ul,li{list-style: none;}
		a:link,a:visited{text-decoration: none;}
		.list{width: 223px;border-bottom:solid 1px #316a91;margin:40px auto 0 auto;}
		.list ul li{background-color:#467ca2; border:solid 1px #316a91; border-bottom:0;}
		.list ul li a{padding-left: 10px;color: #fff; font-size:12px; display: block; font-weight:bold; height:36px;line-height: 36px;position: relative;
		}
		.list ul li .inactive{ background:url(images/off.png) no-repeat 200px center;}
		.list ul li .inactives{background:url(images/on.png) no-repeat 200px center;} 
		.list ul li ul{display: none;}
		.list ul li ul li { border-left:0; border-right:0; background-color:#6196bb; border-color:#467ca2;}
		.list ul li ul li ul{display: none;}
		.list ul li ul li a{ padding-left:20px;}
		.list ul li ul li ul li { background-color:#d6e6f1; border-color:#6196bb; }
		.last{ background-color:#d6e6f1; border-color:#6196bb; }
		.list ul li ul li ul li a{ color:#316a91; padding-left:30px;}
		.list ul li ul li ul li ul{display: none;}
		.list ul li ul li ul li a{ padding-left:20px;}
		.list ul li ul li ul li ul li{ background-color:#fff; border-color:#6196bb; }
		.list ul li ul li ul li ul li a{ color:#316a91; padding-left:30px;}
		
      </style>
	  <script type="text/javascript" src="jquery-1.11.1.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			$('.inactive').click(function(){
				if($(this).siblings('ul').css('display')=='none'){
					$(this).parent('li').siblings('li').removeClass('inactives');
					$(this).addClass('inactives');
					$(this).siblings('ul').slideDown(100).children('li');
					if($(this).parents('li').siblings('li').children('ul').css('display')=='block'){
						$(this).parents('li').siblings('li').children('ul').parent('li').children('a').removeClass('inactives');
						$(this).parents('li').siblings('li').children('ul').slideUp(100);

					}
				}else{
					//控制自身变成+号
					$(this).removeClass('inactives');
					//控制自身菜单下子菜单隐藏
					$(this).siblings('ul').slideUp(100);
					//控制自身子菜单变成+号
					$(this).siblings('ul').children('li').children('ul').parent('li').children('a').addClass('inactives');
					//控制自身菜单下子菜单隐藏
					$(this).siblings('ul').children('li').children('ul').slideUp(100);

					//控制同级菜单只保持一个是展开的（-号显示）
					$(this).siblings('ul').children('li').children('a').removeClass('inactives');
				}
			})
		});
		</script>
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
      <div style="width:100%; height:100%; margin:0 auto; ">
         <div style="width:100%; height:80px;background:#467CA2;line-height:80px;" align="center">
        	   <p style="width:1200px;">
            	   <span style="font-size:24px; color:#FFF; float:left;">腾记下酒菜</span>
                 <span style="font-size:14px; color:#FFF; float:right;">您好，<?php echo $user_name; ?></span>
            </p>
         </div>
         <div style="width:100%; height:auto; background:#f0f0f0;">
        	   <div style="width:1400px; height:100%; margin:0 auto;">
            	  <div style="width:16%; height:100%;background:#467CA2; margin-top:15px; float:left;">
                    <div style="padding-top:1rem;color:#fff;height:2rem;border-bottom:1px #fff solid;" align="center">
                       <p style="font-size:20px;">管理列表</p>
                    </div>
				   <div class="list1" style="height:900px">
					<div class="list">
						<ul class="yiji">
							<li><a href="#" class="inactive">客户管理</a>
								<ul style="display: none">
									<li><a href="#" class="inactive active">浏览</a>
										<ul>
											<li><a href="guke.php" target="main_iframe">客户基本信息</a></li>
<!-- 											<li><a href="addnews.php?news_type=1" target="main_iframe">新闻资讯</a></li>
											<li><a href="addnews.php?news_type=2" target="main_iframe">最新动态</a></li>
											<li><a href="addnews.php?news_type=3" target="main_iframe">通知公告</a></li>
											<li><a href="addnews.php?news_type=4" target="main_iframe">政策法规</a></li>
											<li><a href="addnews.php?news_type=5" target="main_iframe">停车服务收费篇</a></li>
											<li><a href="addnews.php?news_type=6" target="main_iframe">停车服务安全篇</a></li>
											<li><a href="addnews.php?news_type=7" target="main_iframe">停车服务策略篇</a></li> -->
										</ul>
									</li> 
									<li><a href="#" class="inactive active">浏览</a>
										<ul>
											<li><a href="#" class="inactive active">新闻资讯</a>
											<ul>
											<li><a href="list_news.php?news_type=1&news_static=0" target="main_iframe">未审核</a></li>
											<li><a href="list_news.php?news_type=1&news_static=1" target="main_iframe">已审核</a></li>
											<li><a href="list_news.php?news_type=1&news_static=2" target="main_iframe">审核未通过</a></li>
											</ul>
											</li>
											<li><a href="#" class="inactive active">最新动态</a>
											<ul>
											<li><a href="list_news.php?news_type=2&news_static=0" target="main_iframe">未审核</a></li>
											<li><a href="list_news.php?news_type=2&news_static=1" target="main_iframe">已审核</a></li>
											<li><a href="list_news.php?news_type=2&news_static=2" target="main_iframe">审核未通过</a></li>
											</ul>
											</li>
											<li><a href="#" class="inactive active">通知公告</a>
											<ul>
											<li><a href="list_news.php?news_type=3&news_static=0" target="main_iframe">未审核</a></li>
											<li><a href="list_news.php?news_type=3&news_static=1" target="main_iframe">已审核</a></li>
											<li><a href="list_news.php?news_type=3&news_static=2" target="main_iframe">审核未通过</a></li>
											</ul></li>
											<li><a href="#" class="inactive active">政策法规</a>
											<ul>
											<li><a href="list_news.php?news_type=4&news_static=0" target="main_iframe">未审核</a></li>
											<li><a href="list_news.php?news_type=4&news_static=1" target="main_iframe">已审核</a></li>
											<li><a href="list_news.php?news_type=4&news_static=2" target="main_iframe">审核未通过</a></li>
											</ul></li>
											<li><a href="#" class="inactive active">停车服务收费篇</a>
											<ul>
											<li><a href="list_news.php?news_type=5&news_static=0" target="main_iframe">未审核</a></li>
											<li><a href="list_news.php?news_type=5&news_static=1" target="main_iframe">已审核</a></li>
											<li><a href="list_news.php?news_type=5&news_static=2" target="main_iframe">审核未通过</a></li>
											</ul></li>
											<li><a href="#" class="inactive active">停车服务安全篇</a>
											<ul>
											<li><a href="list_news.php?news_type=6&news_static=0" target="main_iframe">未审核</a></li>
											<li><a href="list_news.php?news_type=6&news_static=1" target="main_iframe">已审核</a></li>
											<li><a href="list_news.php?news_type=6&news_static=2" target="main_iframe">审核未通过</a></li>
											</ul></li>
											<li><a href="#" class="inactive active">停车服务策略篇</a>
											<ul>
											<li><a href="list_news.php?news_type=7&news_static=0" target="main_iframe">未审核</a></li>
											<li><a href="list_news.php?news_type=7&news_static=1" target="main_iframe">已审核</a></li>
											<li><a href="list_news.php?news_type=7&news_static=2" target="main_iframe">审核未通过</a></li>
											</ul></li>
										</ul>
									</li> 
									
								</ul>
							</li>
							<li><a href="#" class="inactive">客户咨询管理</a>
								<ul style="display: none">
									<li><a href="#" class="inactive active">浏览</a>
										<ul>
											<li><a href="#" class="inactive active">微信端咨询</a>
											<ul>
											<li><a href="listnews.php?qtn_type=1&qtn_static=0" target="main_iframe">未审核</a></li>
											<li><a href="listnews.php?qtn_type=1&qtn_static=1" target="main_iframe">已审核</a></li>
											<li><a href="listnews.php?qtn_type=1&qtn_static=2" target="main_iframe">审核未通过</a></li>
											</ul>
											<li><a href="#" class="inactive active">网站端咨询</a>
											<ul>
											<li><a href="listnews.php?qtn_type=2&qtn_static=0" target="main_iframe">未审核</a></li>
											<li><a href="listnews.php?qtn_type=2&qtn_static=1" target="main_iframe">已审核</a></li>
											<li><a href="listnews.php?qtn_type=2&qtn_static=2" target="main_iframe">审核未通过</a></li>
											</ul></li>
										</ul>
									</li> 
									 
								</ul>
							</li>
							<li><a href="#" class="inactive">图片管理</a>
								<ul style="display: none">
									<li>
										<a href="addimage.php?imtpe=1" target="main_iframe">首页轮播</a>
										<a href="addimage.php?imtpe=2" target="main_iframe">新闻资讯</a>
										<a href="addimage.php?imtpe=3" target="main_iframe">精彩展示</a>		
									</li> 			 
								</ul>
							</li>
							<li><a href="#" class="inactive">企业信息管理</a>
                <ul style="display: none">
                  <li><a href="#" class="inactive active">添加</a>
                    <ul>
                      <li><a href="addnews.php?news_type=8" target="main_iframe"">企业简介</a></li>
                      <li><a href="addnews.php?news_type=9" target="main_iframe">组织机构</a></li>
                      <li><a href="addnews.php?news_type=10" target="main_iframe">企业荣誉</a></li>
                      <li><a href="addnews.php?news_type=12" target="main_iframe">产品服务</a></li>
                      <li><a href="addnews.php?news_type=11" target="main_iframe">联系我们</a></li>
                    </ul>
                  </li> 
                  <li><a href="#" class="inactive active">浏览</a>
                    <ul>
                      <li><a href="#" class="inactive active">企业简介</a>
                      <ul>
                      <li><a href="list_news.php?news_type=8&news_static=0" target="main_iframe">未审核</a></li>
                      <li><a href="list_news.php?news_type=8&news_static=1" target="main_iframe">已审核</a></li>
                      <li><a href="list_news.php?news_type=8&news_static=2" target="main_iframe">审核未通过</a></li>
                      </ul>
                      </li>
                      <li><a href="#" class="inactive active">组织机构</a>
                      <ul>
                      <li><a href="list_news.php?news_type=9&news_static=0" target="main_iframe">未审核</a></li>
                      <li><a href="list_news.php?news_type=9&news_static=1" target="main_iframe">已审核</a></li>
                      <li><a href="list_news.php?news_type=9&news_static=2" target="main_iframe">审核未通过</a></li>
                      </ul>
                      </li>
                      <li><a href="#" class="inactive active">企业荣誉</a>
                      <ul>
                      <li><a href="list_news.php?news_type=10&news_static=0" target="main_iframe">未审核</a></li>
                      <li><a href="list_news.php?news_type=10&news_static=1" target="main_iframe">已审核</a></li>
                      <li><a href="list_news.php?news_type=10&news_static=2" target="main_iframe">审核未通过</a></li>
                      </ul>
                      </li>
                      <li><a href="#" class="inactive active">产品服务</a>
                      <ul>
                      <li><a href="list_news.php?news_type=12&news_static=0" target="main_iframe">未审核</a></li>
                      <li><a href="list_news.php?news_type=12&news_static=1" target="main_iframe">已审核</a></li>
                      <li><a href="list_news.php?news_type=12&news_static=2" target="main_iframe">审核未通过</a></li>
                      </ul>
                      </li>
                      <li><a href="#" class="inactive active">联系我们</a>
                      <ul>
                      <li><a href="list_news.php?news_type=11&news_static=0" target="main_iframe">未审核</a></li>
                      <li><a href="list_news.php?news_type=11&news_static=1" target="main_iframe">已审核</a></li>
                      <li><a href="list_news.php?news_type=11&news_static=2" target="main_iframe">审核未通过</a></li>
                      </ul>
                      </li>
                    </ul>
                  </li> 
								</ul>
							</li>		
						
					</div>
					</div>
                       <div style="margin-top:2rem;border-top:1px #fff solid;width:100%;height:3rem;padding-top:2rem;" align="center">
                          <p style="color:#fff;font-size:20px;"><?php echo date('Y-m-d', time()); ?></p>
                       </div>
                </div>
                <div style="float:right; width:83%; height:1000px;">
                	 <iframe name="main_iframe" src="guke.php" scrolling="no" frameborder="no" style="width:100%; height:100%;"></iframe>
                </div>
            </div>
         </div>
         <div class="Business-footer"></div>
      </div>
   </body>
</html>