<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:50:"E:\git\TpStage/apps/backend\view\system\index.html";i:1531389461;s:49:"E:\git\TpStage\apps\backend\view\common\base.html";i:1531559955;s:51:"E:\git\TpStage\apps\backend\view\common\header.html";i:1531559973;s:49:"E:\git\TpStage\apps\backend\view\common\menu.html";i:1531106323;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.jpg" >
<link rel="Shortcut Icon" href="/favicon.jpg" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/static/hui/lib/html5.js"></script>
<script type="text/javascript" src="/static/hui/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/hui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/hui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/hui/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/hui/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/hui/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/static/hui/lib/webuploader/0.1.5/webuploader.css"  />
<title><?php echo $title; ?> - TpStage v1.0</title>
<meta name="keywords" content="">
<meta name="description" content="">

<script type="text/javascript" src="/static/hui/lib/jquery/1.9.1/jquery.min.js"></script> 
</head>
<body>

<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> 
			<a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">TpStage</a> 
			<a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">TpStage</a> 
			<span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.0</span> 
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav">
			<ul class="cl top-menu">
				<?php foreach (request()->menuList as $mlk=>$mlvo) { ?>
					<li class="dropDown dropDown_hover"><a href="<?=url($mlvo['name'],['module_menu_id'=>$mlvo['id']])?>" ><?=$mlvo['title']?></a></li>
				<?php } ?>
			</ul>
			</nav>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li>天天好心情</li>
					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A"><?php echo \think\Session::get('userInfo.nickname'); ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;">个人信息</a></li>
							<li><a href="<?=url('Login/logout')?>">退出</a></li>
						</ul>
					</li>

					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
						</ul>
					</li>

				</ul>
			</nav>
		</div>
	</div>
</header> 
<aside class="Hui-aside">

	<div class="menu_dropdown bk_2">
		<?php $menu_select = 0; $menu_select_action = 0;foreach (request()->menuList as $mlk=>$mlvo) { if(isset($mlvo['_child']) && $mlvo['id']==request()->selectMenu){ foreach ($mlvo['_child'] as $mlkk=>$mlvoo) { ?>
					<dl>
						<dt><i class="Hui-iconfont"><?=$mlvoo['icon']?></i> <?=$mlvoo['title']?><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
					<?php if(isset($mlvoo['_child'])){ ?>
						<dd 
						<?php if($mlvoo['id']==request()->menuPidArr[strtolower(request()->module().'/'.request()->controller())]){ ?>
							style="display:block"
						<?php } ?>
						>
							<ul>
						<?php foreach ($mlvoo['_child'] as $mlkkk=>$mlvooo) { ?>
							<li 

						<?php foreach ($mlvoo['_child'] as $_mlkkk=>$_mlvooo) { if(ACCESS_URL==strtolower($_mlvooo['name'])){
								$menu_select_action = 1;
							} } if($menu_select_action==1){ if(ACCESS_URL==strtolower($mlvooo['name']) && $menu_select==0){ $menu_select = 1; ?>
								class="current"
							<?php } }else{ if(explode("/", strtolower($mlvooo['name']))[1]==strtolower(request()->controller()) && $menu_select==0){ $menu_select = 1; ?>
								class="current"
							<?php } } ?>
							>
								<a href="<?=url($mlvooo['name'])?>" title="<?=$mlvooo['title']?>"><?=$mlvooo['title']?></a>
							</li>
						<?php } ?>
							</ul>
						</dd>
					<?php } ?>
					</dl>
				<?php } } }

		?>

	</div>
</aside>
<div class="dislpayArrow hidden-xs">
	<a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
</div> 


<section class="Hui-article-box">
    <nav class="breadcrumb">
        <i class="Hui-iconfont"></i>
        <a href="/">首页</a>
        <span class="c-999 en">&gt;</span>
        <span class="c-666">我的桌面</span>
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新">
            <i class="Hui-iconfont">&#xe68f;</i></a>
    </nav>

    <article class="cl pd-20">
		<form action="" method="post" class="form form-horizontal" id="form-article-add">
			<div id="tab-system" class="HuiTab">
				<div class="tabBar cl"><span>基本设置</span><span>安全设置</span><span>邮件设置</span><span>其他设置</span></div>
				<div class="tabCon">
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>网站名称：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text" id="website-title" placeholder="控制在25个字、50个字节以内" value="" class="input-text">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>关键词：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text" id="website-Keywords" placeholder="5个左右,8汉字以内,用英文,隔开" value="" class="input-text">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>描述：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text" id="website-description" placeholder="空制在80个汉字，160个字符以内" value="" class="input-text">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>css、js、images路径配置：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text" id="website-static" placeholder="默认为空，为相对路径" value="" class="input-text">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>上传目录配置：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text" id="website-uploadfile" placeholder="默认为uploadfile" value="" class="input-text">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>底部版权信息：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text" id="website-copyright" placeholder="&copy; 2014 H-ui.net" value="" class="input-text">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2">备案号：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text" id="website-icp" placeholder="京ICP备00000000号" value="" class="input-text">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2">统计代码：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<textarea class="textarea"></textarea>
						</div>
					</div>
				</div>
				<div class="tabCon">
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2">允许访问后台的IP列表：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<textarea class="textarea"></textarea>
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2">后台登录失败最大次数：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text"  value="5" class="input-text">
						</div>
					</div>
				</div>
				<div class="tabCon">
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2">邮件发送模式：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text"  value="" class="input-text">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2">SMTP服务器：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text"  value="" class="input-text">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2">SMTP 端口：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text"  value="25" class="input-text">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2">邮箱帐号：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text" id="email-name" value="" class="input-text">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2">邮箱密码：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="password" id="email-password" value="" class="input-text">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2">收件邮箱地址：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text" id="email-address" value="" class="input-text">
						</div>
					</div>
				</div>
				<div class="tabCon"> </div>
			</div>
			<div class="row cl">
				<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
					<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
					<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
				</div>
			</div>
		</form>
	</article>

</section>


<script type="text/javascript" src="/static/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/hui/static/h-ui/js/H-ui.js"></script> 

<script type="text/javascript">
	$(function(){ 
		$("#tab-system").Huitab(); 
	}); 
</script>

<script type="text/javascript" src="/static/hui/static/h-ui.admin/js/H-ui.admin.page.js"></script> 
</body>
</html>