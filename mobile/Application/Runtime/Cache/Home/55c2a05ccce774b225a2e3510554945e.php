<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
	<title>魔购出行（M-GO）</title>
	<meta name="keywords" />
	<meta name="description"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width ,initial-scale=1, maximum-scale=1, user-scalable=yes, minimal-ui">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="format-detection" content="telephone=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="full-screen" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<link rel="stylesheet" href="/mgotrip/mobile/Public/mgotrip/mgocx_css/common.css">
<link rel="stylesheet" href="/mgotrip/mobile/Public/mgotrip/mgocx_css/index.css">
<link rel="stylesheet" href="/mgotrip/mobile/Public/mgotrip/mgocx_css/base.css">
<link rel="stylesheet" href="/mgotrip/mobile/Public/mgotrip/mgocx_css/my.css">
<link rel="stylesheet" href="/mgotrip/mobile/Public/mgotrip/mgocx_css/origin.css">
<link rel="stylesheet" href="/mgotrip/mobile/Public/mgotrip/mgocx_css/need/layer.css">
<script type="text/javascript" src="/mgotrip/mobile/Public/mgotrip/mgocxjs/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/mgotrip/mobile/Public/mgotrip/mgocxjs/common.js"></script>
<script type="text/javascript" src="/mgotrip/mobile/Public/mgotrip/mgocx_css/layer.js"></script>

<body>
	<header class="head_bar">
		<a href="javascript:void(0)" class="arrow_r"></a>
		<span class="c_txt">M-GO</span>
		<a href="javascript:void(0)" class="user_login"></a>
	</header>
	<!--魔购头部-->
	<!--头部搜索-->
	<section class="content">
		<div class="head_search">
			<span class="my_citys">上海</span>
			<div class="input_searchs"> <i class="icon_search"></i>
				<input type="search" class="search_s" placeholder="您现在要去哪儿？" />
			</div>
			<a href="javascript:void(0)" class="cancle_btn">取消</a>
		</div>

		<div class="org_bj">
			<ul class="clearfix panel_ul">
				<li>
					徐汇区漕溪北路2000号
					<span class="map"></span>
				</li>
				<li>龙漕北路199号</li>
				<li>番禺路1028号-东门</li>
				<li>太平洋百货</li>
				<li class="current">汇金百货</li>
				<li>瑞金南苑-西门</li>
				<li>复兴佳苑</li>
				<li>锦秋国际停车场</li>
				<a href="javascript:void(0)" class="clear_record">清空历史记录</a>
			</ul>
		</div>
	</section>
	<script type="text/javascript">
	$(function(){
		$('.panel_ul li').click(function(){			
			$(this).addClass('current').siblings().removeClass('current');
	})
		})
	</script>
</body>
</html>