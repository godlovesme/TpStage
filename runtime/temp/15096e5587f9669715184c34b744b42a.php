<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:48:"E:\git\TpStage/apps/backend\view\demo\index.html";i:1531467076;s:49:"E:\git\TpStage\apps\backend\view\common\base.html";i:1531559955;s:51:"E:\git\TpStage\apps\backend\view\common\header.html";i:1531559973;s:49:"E:\git\TpStage\apps\backend\view\common\menu.html";i:1531106323;}*/ ?>
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


<section class="Hui-article-box form-list" >
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		Demo
		<span class="c-gray en">&gt;</span>
		表单
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
	<article class="page-container" >
		<form class="form form-horizontal " id="form-article-add" >
			
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章标题：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text" value="" placeholder="" id="" name="">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">简略标题：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text" value="" placeholder="" id="" name="">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
				<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
					<select name="" class="select">
						<option value="0">全部栏目</option>
						<option value="1">新闻资讯</option>
						<option value="11">├行业动态</option>
						<option value="12">├行业资讯</option>
						<option value="13">├行业新闻</option>
					</select>
					</span> </div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章类型：</label>
				<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
					<select name="" class="select">
						<option value="0">全部类型</option>
						<option value="1">帮助说明</option>
						<option value="2">新闻资讯</option>
					</select>
					</span> </div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">排序值：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text" value="0" placeholder="" id="" name="">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">关键词：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text" value="" placeholder="" id="" name="">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">文章摘要：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<textarea name="" cols="" rows="" class="textarea"  placeholder="说点什么..." ></textarea>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">文章作者：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text" value="0" placeholder="" id="" name="">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">文章来源：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text" value="0" placeholder="" id="" name="">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">允许评论：</label>
				<div class="formControls col-xs-8 col-sm-9 skin-minimal">
					<div class="check-box">
						<input type="checkbox" id="checkbox-pinglun" name='is_comment' value="1" checked>
						<label for="checkbox-pinglun">&nbsp;</label>
					</div>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>性别：</label>
				<div class="formControls col-xs-8 col-sm-9 skin-minimal">
					<div class="radio-box">
						<input type="radio" id="sex-1" name="sex" value='男' checked>
						<label for="sex-1">男</label>
					</div>
					<div class="radio-box">
						<input type="radio" id="sex-2" name="sex" value='女'>
						<label for="sex-2">女</label>
					</div>
					<div class="radio-box">
						<input type="radio" id="sex-3" name="sex" value='保密'>
						<label for="sex-3">保密</label>
					</div>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">评论开始日期：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',alwaysUseStartDate:true})" id="datemin" class="input-text Wdate">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">评论结束日期：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',alwaysUseStartDate:true})" id="datemax" class="input-text Wdate">
				</div>
			</div>
			
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">缩略图：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text" value="" placeholder="" id="图片路径" name="image">
					<div class="uploader-thum-container">
						<div class="uploader-list"></div>
						<br>
						<?php echo widget('Upload/webImage', ['name' => 'image','title'=>"选择图片"]); ?>
					</div>
				</div>
			</div>

			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">缩略图：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text" value="" placeholder="" id="图片路径" name="image2">
					<div class="uploader-thum-container">
						<div class="uploader-list"></div>
						<br>
						<?php echo widget('Upload/webImage', ['name' => 'image2','title'=>"选择图片",'one'=>false]); ?>
					</div>
				</div>
			</div>


			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">文章内容：</label>
				<div class="formControls col-xs-8 col-sm-9"> 
					<?php echo widget('Editor/ueditor', ['id' => 'editor','name'=>"content",'content'=>'123456']); ?>
				</div>
			</div>

			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">文章内容：</label>
				<div class="formControls col-xs-8 col-sm-9"> 
					<?php echo widget('Editor/ueditor', ['id' => 'editor2','name'=>"content2",'content'=>'123456','one'=>false]); ?>
				</div>
			</div>

			</form>
			<br>
			<div class="row cl">
				<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
					<button class="btn btn-primary radius" ><i class="Hui-iconfont">&#xe632;</i> 展示使用</button>
					
				</div>
			</div>
		
	</article>
</section>


<script type="text/javascript" src="/static/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/hui/static/h-ui/js/H-ui.js"></script> 

<script type="text/javascript" src="/static/hui/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/static/hui/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/static/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/static/hui/lib/jquery.validation/1.14.0/messages_zh.js"></script>   


<script type="text/javascript">

$(function(){

	$(".textarea").Huitextarealength({
    	minlength:0,
    	maxlength:200,
    	exceed:false
    });

	$('.skin-minimal input').on('ifChecked', function(event){
	  $(this).attr('checked',true)

	});
	$('.skin-minimal input').on('ifUnchecked', function(event){
	  $(this).removeAttr('checked');
	});
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	

	

   
});
</script>

<script type="text/javascript" src="/static/hui/static/h-ui.admin/js/H-ui.admin.page.js"></script> 
</body>
</html>