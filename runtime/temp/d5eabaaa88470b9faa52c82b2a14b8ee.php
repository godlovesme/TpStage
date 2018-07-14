<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:49:"E:\git\TpStage/apps/backend\view\login\index.html";i:1531560716;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/static/hui/lib/html5.js"></script>
<script type="text/javascript" src="/static/hui/lib/respond.min.js"></script>
<![endif]-->
<link href="/static/hui/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/static/hui/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/static/hui/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/static/hui/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<title>登录</title>
<style type="text/css">
    .layui-layer-content{color:#000;}
    input{color:#000;};
</style>
</head>
<body class="signin">
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-7 ">
            <div class="signin-info">
                <div class="logopanel m-b">
                    <h1>[ TpStage ]</h1>
                </div>
                <div class="m-b"></div>
                <h4>欢迎使用</h4>
                <ul class="m-b">
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 耶</li>
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 稣</li>
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 爱</li>
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 我</li>
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> ！</li>
                </ul>
                <strong>Jesus loves me ...</strong>
            </div>
        </div>
        <div class="col-sm-5 ">

            <form method="post" class='data-form' data-url="<?=url('Login/doLogin')?>">
                <h4 class="no-margins">登录：</h4>
                <p class="m-t-md">登录到TpStage后台</p>
                <input name="email" class="form-control uname" placeholder="邮箱" type="text">
                <input name="password" class="form-control pword m-b" placeholder="密码" type="password">
                <img src="<?=url('/captcha')?>" alt="点击切换" class="captcha" onclick="this.src=this.src+'?'+Math.random()">
                <input name="verify_code" class="form-control  m-b" placeholder="验证码" type="text" style="color:#000">
                <a class="btn btn-success btn-block do-form" href="javascript:;">登录</a>
                <br>
                <div class="alert alert-danger fade in" role="alert">
                      <span class="label label-danger"></span>
                </div>
            </form>
            
        </div>
    </div>
    <div class="signup-footer">
        <div class="pull-left">
            © <?=date('Y')?> All Rights Reserved. TpStage
        </div>
    </div>
</div>
<script type="text/javascript" src="/static/hui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/hui/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript">
    var form_ajax = 0;
    $('.do-form').click(function(){

        var email = $("input[name='email']").val();
        var password = $("input[name='password']").val();
        var verify_code = $("input[name='verify_code']").val();

        if(email==''){
            layer.alert('请输入邮箱');return;
        }
        if(password==''){
            layer.alert('请输入密码');return;
        }
         if(verify_code==''){
            layer.alert('请输入验证码');return;
        }

        var url = $('.data-form').attr('data-url');
        if(form_ajax!=0) return;
        form_ajax = 1;
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data:$('.data-form').serialize(),
            success: function(data){
                if(data.status==1){
                    layer.msg(data.msg,{icon:1,time:1000},function(){
                        window.location.href = data.url;
                        form_ajax = 0;
                    });
                }else{
                    layer.alert(data.msg);
                    form_ajax = 0;
                    $('.captcha').trigger('click');
                }
                
            },
            error:function(data) {
                window.console.log(data.msg);
                form_ajax = 0;
            },
        }); 

    });
</script>
</body>
</html>