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

<!--前端通用引用-->
<link rel="stylesheet" href="/mgotrip/mobile/Public/mgotrip/mgocx_css/common.css">
<link rel="stylesheet" href="/mgotrip/mobile/Public/mgotrip/mgocx_css/index.css">
<link rel="stylesheet" href="/mgotrip/mobile/Public/mgotrip/mgocx_css/base.css">
<link rel="stylesheet" href="/mgotrip/mobile/Public/mgotrip/mgocx_css/my.css">
<link rel="stylesheet" href="/mgotrip/mobile/Public/mgotrip/mgocx_css/origin.css">
<link rel="stylesheet" href="/mgotrip/mobile/Public/mgotrip/mgocx_css/need/layer.css">
<!--<script type="text/javascript" src="/mgotrip/mobile/Public/mgotrip/mgocxjs/jquery-1.7.2.min.js"></script>-->


<!--百度地图相关引用-->
<link rel="stylesheet" href="/mgotrip/mobile/Public/mgotrip/poshytip/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
<script type="text/javascript" src="/mgotrip/mobile/Public/mgotrip/poshytip/includes/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/mgotrip/mobile/Public/mgotrip/poshytip/jquery.poshytip.js"></script>
<script src="http://api.map.baidu.com/api?v=2.0&ak=UQRkijgp4GWEFa1g2cRQpytGox5nf5dy" type="text/javascript"></script>

<script type="text/javascript" src="/mgotrip/mobile/Public/mgotrip/mgocxjs/common.js"></script>
<script type="text/javascript" src="/mgotrip/mobile/Public/mgotrip/mgocx_css/layer.js"></script>

<!--测试的引用-->
<script type="text/javascript" src="/mgotrip/mobile/Public/mgotrip/test.js"></script>

<body>
<header class="head_bar">
    <span class="c_txt">M-GO</span>
    <a href="javascript:void(0)" class="user_login"></a>
</header>
<!--魔购头部-->
<!--魔购出行 star-->
<div class="mgo_map_index" >
    <div id="index_baidumap" style="height:100%;"></div>
    <a href="next_step_1.html" class="on_taxi">确定</a>
    <img id="index_mid_logo" src="/mgotrip/mobile/Public/mgotrip/images/home-location.png"  style="height:10%;" />
</div>

<div class="main_sm">
    <ul class="u_panel clearfix">
        <li class="clearfix li_p org">
            <span class="icon_s"></span>
            <input type="text" class="s_areas" disabled placeholder="请输入初始位置" />
        </li>
        <li class="clearfix li_p des" style="border-bottom: 0;">
            <span class="icon_e"></span>
            <input type="text" class="s_areas" disabled placeholder="请输入目的地"/>
        </li>
    </ul>
</div>
<!--登录框 star-->
<div class="shade3_box">
    <div class="login_box" id="login_box">
        <div class="login_bar">
            <h3>验证手机</h3>
            <a href="javascript:void(0)" class="btn-close-box"></a>
            <!--表单star-->
            <div class="form-box">
                <div class="form-label">
                    <input type="tel" name="" placeholder="请输入手机号" class="form-input mobile" />
                </div>
                <div class="form-label">
                    <input type="number" name="" placeholder="请输入验证码" class="form-input smaller codes" />
                    <!-- <i class="close_i"></i>
                -->
                    <span class="r_text">获取验证码</span>
                </div>
                <a href="javascript:void(0)" class="login_btns" disabled="disabled">登录</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('.user_login').click(function(){
            $('.shade3_box').slideDown();
            $('body').addClass('hidden');
        });
        $('.btn-close-box').click(function(){
            $('.shade3_box').hide();
            $('body,.main_sm').removeClass('hidden');
            window.location.reload();
        });
        $('.form-input').each(function(){
            if($(this).val() ==''){
                $('.login_btns').removeClass('login_on');
                $('.login_btns').attr("disabled","disabled")
                return false;
            }  else{
                $('.login_btns').addClass('login_on');
                $('.login_btns').removeAttr("disabled");
            }
        });
        $(".form-input").keyup("input", function() {
            var parents =  $(this).parents('.form-box');
            parents.find('.form-input').each(function(e){
                if($(this).val() == ''){
                    $('.login_btns').removeClass('login_on');
                    $('.login_btns').attr("disabled","disabled")
                    return false;
                }
                $('.login_btns').addClass('login_on');
                $('.login_btns').removeAttr("disabled");

            })
        });

        $('.login_btns').on('click',function(){
            if($(this).attr('disabled') == 'disabled'){
                return;
            }else{
                var mobile = $.trim($('.mobile').val());
                var codes = $.trim($('.codes').val());
                var number = /^(1[3578]\d|14[57])[0-9]{8}$/;
                if(!mobile){
                    layer.open({
                        content: '请填写手机号码',
                        btn: ['确认', '取消']
                    });
                    return false;
                }else if(!number.test(mobile)){
                    // alert('请输入正确的手机号');
                    layer.open({
                        content: '请输入正确的手机号',
                        btn: ['确认', '取消']
                    });
                }
                if(!codes){
                    layer.open({
                        content: '请填写验证码',
                        btn: ['确认', '取消']
                    });

                    return false;
                }
            }

        })
        $('.r_text').click(function(){
            var mobile = $.trim($('.mobile').val());
            var number = /^(1[3578]\d|14[57])[0-9]{8}$/;
            if(!mobile){
                layer.open({
                    content: '请填写手机号码',
                    btn: ['确认', '取消']
                });
                return false;
            }else if(!number.test(mobile)){
                layer.open({
                    content: '请输入正确的手机号',
                    btn: ['确认', '取消']
                });
            }
        })
        $('.u_panel li.des').click(function(){
            window.location.href = '/mgotrip/mobile/index.php/Home/Index/destination';
        })
        $('.u_panel li.org').click(function(){
            window.location.href = '/mgotrip/mobile/index.php/Home/Index/origin';
        })
    });

    /*百度地图相关start*/
    /*创建地图对象 start*/
    var map= new BMap.Map('index_baidumap');
    map.centerAndZoom('<?php echo ($currentCity); ?>',10);
    map.enableScrollWheelZoom();
    map.disableInertialDragging();
    /*创建地图对象 end*/

    /*设置Poshtip控件并启动 start*/
    function addPoshtip(msg){
        $('#logo').poshytip({
            content: msg,
            className: 'tip-yellowsimple',
            showOn: 'none',
            alignTo: 'target',
            alignX: 'center',//inner-left
            offsetX: 0,
            offsetY: 5
        });
        $('#logo').poshytip('show');
    }
    var firstMsg='定位中...';
    addPoshtip(firstMsg);
    /*设置Poshtip控件并启动 end*/

    function updatePoshtip(msg){
        $('#logo').poshytip('update',msg);
    }

    /*获取当前位置-定位start*/
    var geolocation=new BMap.Geolocation();

    geolocation.getCurrentPosition(function (r){
        if(this.getStatus() == BMAP_STATUS_SUCCESS){
            map.panTo(r.point);
            map.setZoom(15);
            geoc.getLocation(r.point,function(ci){
                var addrinfo=ci.addressComponents;
                var firstMsg=addrinfo.province+addrinfo.city+addrinfo.district+addrinfo.street+addrinfo.streetNumber;
                updatePoshtip(firstMsg);
            });
        }else{
            var firstMsg='定位失败，拖动地图以选择起点！';
            updatePoshtip(firstMsg);
        }
    },{enableHighAccuracy:true});
    /*获取当前位置-定位end*/

    /*定位箭头图标到地图中心点 start*/
    var ww=document.getElementById('index_baidumap').offsetWidth;
    var wh=document.getElementById('index_baidumap').offsetHeight;
    var logo=document.getElementById('index_mid_logo');
    var logow=logo.width;
    var logoh=logo.height;
    logo.style.position='absolute';
    logo.style.bottom=wh/2+'px';
    logo.style.left=(ww-logow)/2+'px';
    /*定位箭头图标到地图中心点 end*/

    /*获取中心点的地址信息 start*/
    var geoc=new BMap.Geocoder();

    function moveGetAddr(){
        var cc=map.getCenter();
        geoc.getLocation(cc,function(cic){
            var addrinfoC=cic.addressComponents;//addressComponents
            updatePoshtip(addrinfoC.province+addrinfoC.city+addrinfoC.district+addrinfoC.street+addrinfoC.streetNumber);
        });
    }
    /*获取中心点的地址信息 start*/

    /*添加移动监听事件*/
    map.addEventListener('dragend',moveGetAddr);
    map.addEventListener('touchmove',moveGetAddr);
    /*百度地图相关end*/

</script>
</body>
</html>