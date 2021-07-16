<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>后台管理界面</title>
		<link rel="stylesheet" href="dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="dist/fonts/iconfont.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="_token" content="{{ csrf_token() }}">
		<style>
			body,html{
				height: 100%;
			}
			header.left{
				line-height: 60px;
				border-bottom: 1px solid #fff;
				background-color: #001529;
			}
			header.right{
				line-height: 60px;
				border-bottom: 1px solid #aaa;
			}
			ul{
				list-style: none;
				margin: 0;
				padding: 0;
			}
			nav{
				margin-top: 60px;
			}
			nav>ul>li>h6{
				line-height: 60px;
				margin-bottom: 0;
				padding-left:15px;
			}
			nav>ul>li i{
				padding-right:10px;
			}
			aside{
				background-color: #001529;
				overflow-y: auto;
				scrollbar-width: none;
				
			}
			
			.collapse li{
				line-height: 60px;
				padding-left:30px;
			}
			.collapse li.active{
				background-color: #1a86ee;
			}
			.collapse li:hover{
				background-color: #aaa;
				cursor: pointer;
			}
			
			.btn-tab{
				border-bottom:1px solid #ccc;
				overflow-x: auto;
			}
			.btn-tab i{
				font-size: 12px;
				padding-left:20px;
				cursor: pointer;
			}
			#content{
				margin: 20px 0;
			}
		</style>
	</head>
	<body>
		<section class="container-fluid h-100">
			<div class="row h-100">
				<header class="left col-md-2 text-white text-center mb-2 fixed-top">后台管理系统</header>
				<aside class="col-md-2 text-white p-0 h-100">
					<nav>
						<ul>
							<li>
								<h6 class="item"><a data-src="index"><i class="iconfont"></i>工作台</a></h6>
							</li>
							<li>
								<h6 data-toggle="collapse" data-target=".data"><i class="iconfont icon-shujufenxi"></i>数据分析</h6>
								<ul class="collapse data">
									<li class="item" data-src="" data-parent="数据分析"><a><i class="iconfont icon-shuju"></i>主控数据</a></li>
									<li class="item" data-src="" data-parent="数据分析"><a><i class="iconfont icon-shuju"></i>监控数据</a></li>
								</ul>
							</li>
							<li>
								<h6 data-toggle="collapse" data-target=".product"><i class="iconfont icon-chanpinguanli"></i>产品管理</h6>
								<ul class="collapse product">
									<li  class="item" data-src="productDoing" data-parent="产品管理"><a><i class="iconfont icon-shuju"></i>在售产品</a></li>
									<li  class="item" data-src="productWating" data-parent="产品管理"><a><i class="iconfont icon-shuju"></i>待上架产品</a></li>
									<li  class="item" data-src="productDown" data-parent="产品管理"><a><i class="iconfont icon-shuju"></i>已下架产品</a></li>
									<li  class="item" data-src="productClass" data-parent="产品管理"><a><i class="iconfont icon-shuju"></i>产品分类</a></li>
								</ul>
							</li>
							<li>
								<h6 data-toggle="collapse" data-target=".buju"><i class="iconfont icon-bujushezhi"></i>布局控制</h6>
								<ul class="collapse buju">
									<li  class="item"><a><i class="iconfont icon-xinxi"></i>关键词</a></li>
									<li  class="item"><a><i class="iconfont icon-xinxi"></i>公告</a></li>
									<li  class="item"><a><i class="iconfont icon-xinxi"></i>首页轮播图</a></li>
									<li  class="item"><a><i class="iconfont icon-xinxi"></i>广告图</a></li>
								</ul>
							</li>
							<li>
								<h6 data-toggle="collapse" data-target=".controller"><i class="iconfont icon-hulianwangyingxiao-"></i>营销控制</h6>
								<ul class="collapse controller">
									<li  class="item"><a><i class="iconfont icon-xinxi"></i>秒杀时间段</a></li>
									<li  class="item"><a><i class="iconfont icon-xinxi"></i>秒杀产品</a></li>
									<li  class="item"><a><i class="iconfont icon-xinxi"></i>特色专区</a></li>
									<li  class="item"><a><i class="iconfont icon-xinxi"></i>精选分类</a></li>
								</ul>
							</li>
							<li>
								<h6 data-toggle="collapse" data-target=".cardManage"><i class="iconfont icon-hulianwangyingxiao-"></i>卡券管理</h6>
								<ul class="collapse cardManage">
									<li  class="item"><a><i class="iconfont icon-xinxi"></i>优惠劵强类型</a></li>
									<li  class="item"><a><i class="iconfont icon-xinxi"></i>优惠券列表</a></li>
								</ul>
							</li>
							<li>
								<h6 data-toggle="collapse" data-target=".user"><i class="iconfont icon-user"></i>个人中心</h6>
								<ul class="collapse user">
									<li  class="item"><a><i class="iconfont icon-shezhi"></i>个人设置</a></li>
									<li  class="item"><a><i class="iconfont icon-xiaoxi"></i>个人消息</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</aside>	
				<article class="col-md-10">
					<header class="right d-flex justify-content-between fixed-md-top justify-content-end">
						<div class="pos">首页 / 工作台</div>
						<div class="user">admin</div>
					</header>
					<section class="main">
						<div class="btn-tab p-2" id="topNav">
							<!-- 添加标签页 -->
							
						</div>
						<div id="content"></div>
					</section>
				</article>
			</div>
		</section>
		
		<script src="dist/js/jquery.min.js"></script>
		<script src="dist/js/popper.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
		<script>
			$(function(){
				// 默认加载工作台页面
				$('#content').load("{{route('work')}}");
				//存储已打开的页面
				    var tabList = [];
				//存储当前状态的索引值 
					var index;
				// 点击侧边栏导航加载响应的页面
				$("nav .item").click(function(){
					// 移除样式
					navActive($(this));
					
					// 添加标签页
						// 获取当前点击的元素内容
						var dataSrc=$(this).attr("data-src");
						var dataText=$(this).text();
						var dataParent=$(this).parent().siblings("h6").text();
						if(tabList.indexOf(dataText)==-1){
							// 移除其他标签样式
							$(".btn-tab button").removeClass("btn-primary").addClass("btn-outline-secondary");
							// 添加新标签页
							var str='<button type="button" class="btn-sm btn-primary" data-src="'+dataSrc+'" data-parent="'+dataParent+'">'+dataText+'<i class="iconfont icon-guanbi"></i></button> ';
							$(".btn-tab").append(str);
							tabList.push(dataText);
							index=tabList.length-1;
							loadAjax(dataSrc,dataText,$(this).parent().siblings("h6").text());
						}else{
							var el=$(".btn-tab button").eq(tabList.indexOf(dataText));
							tabActive(el);
							index=tabList.indexOf(dataText);
							loadAjax(el.attr("data-src"),el.text(),el.attr("data-parent"));	
						}
				
				})
				
				// 点击顶部标签
				$(".btn-tab").on('click',"button",function(){
					tabActive($(this));
					navItem($(this));
					index=$(this).index();
					loadAjax($(this).attr("data-src"),$(this).text(),$(this).attr("data-parent"));
				})
				
				// 点击顶部标签的关闭按钮
				$(".btn-tab").on('click',"i",function(e){
					e.stopPropagation();
					var prevEL;
					// 判断当前关闭的标签页是否是当前已经打开的标签
					if($(this).parent().index()==index){
						prevEL=$(this).parent().prev();
						tabActive(prevEL);
						index--;
						loadAjax(prevEL.attr("data-src"),prevEL.text(),prevEL.attr("data-parent"));
					}else{
						prevEL=$(this);
					}
					$(this).parent().remove();
					tabList.splice($(this).parent().index(),1);
					navItem(prevEL);
				})
				// 遍历左侧导航
				function navItem(el){
					console.log(el);
					$("nav .item").each(function(){
						if($(this).text()==el.text()){
							navActive($(this));
						}
					})
				}
				
				// 当前导航样式
				function navActive(el){
					el.addClass("active").siblings().removeClass("active").parents("li").siblings().find("li").removeClass("active");
				}
				
				// 当前标签页
				function tabActive(el){
					el.addClass("btn-primary").removeClass("btn-outline-secondary").siblings().addClass("btn-outline-secondary").removeClass("btn-primary");
				}
				
				// 加载指定页面函数
				function loadAjax(obj,txt,preT){
					if(obj=='index'){
						$(".pos").text("首页 / 工作台");
						$('#content').load("{{route('work')}}");
					}else{
						$(".pos").text("首页 / "+preT+" / "+txt);
						$('#content').load("{{url('admin/productClass')}}".replace("productClass",obj));
					}
					
				}
			})
		</script>
	</body>
</html>
