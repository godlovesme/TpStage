<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:49:"E:\git\TpStage/apps/backend\view\admin\index.html";i:1531560235;s:49:"E:\git\TpStage\apps\backend\view\common\base.html";i:1531559955;s:51:"E:\git\TpStage\apps\backend\view\common\header.html";i:1531559973;s:49:"E:\git\TpStage\apps\backend\view\common\menu.html";i:1531106323;}*/ ?>
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
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		管理员
		<span class="c-gray en">&gt;</span>
		管理员
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<form action="<?=url('')?>">
				<div class="text-c input-search">

					<span class="select-box inline">
					<select name="status" class="select">
						<option value="">===请选择状态===</option>
						<?php foreach (model('modelcommon')->status_arr as $key => $value) {?>
							<option value="<?=$key?>"><?=$value?></option>
						<?php } ?>
					</select>
					</span>
					
					<input type="text" name="nickname" value="<?php echo \think\Request::instance()->get('nickname'); ?>" placeholder="昵称" class="input-text input-search-text">
					<input type="text" name="email" value="<?php echo \think\Request::instance()->get('email'); ?>" placeholder="邮箱" class="input-text input-search-text">
					<input type="text" name="weixin" value="<?php echo \think\Request::instance()->get('weixin'); ?>" placeholder="微信号" class="input-text input-search-text">
					
					<button name=""  class="btn btn-success btn-search" type="submit">
						<i class="Hui-iconfont">&#xe665;</i> 搜索 &nbsp;</button>
					
				</div>
			</form>
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l do-btn">
				<a href="javascript:;" class="btn btn-danger radius do-dels" data-url='<?=url("del")?>' >批量删除</a>
				<a class="btn btn-primary radius" href="<?=url('add')?>">添加管理员</a>
				
				</span>
				<span class="r record-num">共有数据：<strong><?=$list['total']?></strong> 条</span>
			</div>

			<div class="mt-20 ">
			    
			        <div class="dataTables_wrapper ">
			            
			            <table class="table table-border table-bordered table-hover table-striped table-list" id="DataTables_Table_0" role="grid" >
			                <thead>
			                    <tr class="text-c">
									<th><input type="checkbox" name="" value="" ></th>
									<th>ID</th>
									<th>昵称</th>
									<th>性别</th>
									<th>邮箱</th>
									<th>微信号</th>
									<th>登录次数</th>
									<th>最后登录IP</th>
									<th>最后登录时间</th>
									<th>状态</th>
									<th>添加时间</th>
									<th>更新时间</th>
									<th>操作</th>
								</tr>
			                </thead>
			                <tbody>
			                	<?php if(empty($list['data'])){ ?>
			                	<tr class="text-c " role="row" >
			                        <td colspan='99'>sorry！暂无数据</td>
			                    </tr>
			                	<?php }else{ foreach ($list['data'] as $info) { ?>
				                		<tr class="text-c " role="row">
					                        <td><input type="checkbox" value="<?=$info['uid']?>" class="info-id"></td>
					                        <td><?=$info['uid']?></td>
					                        <td><?=$info['nickname']?></td>
					                        <td><?=$info['sex']?></td>
					                        <td><?=$info['email']?></td>
					                        <td><?=$info['weixin']?></td>
					                        <td><?=$info['login_num']?></td>
					                        <td><?=$info['last_login_ip']?></td>
					                        <td><?=$info['last_login_time']?></td>
					                        <td><?=$info['status_text']?></td>
					                        <td><?=$info['add_time']?></td>
					                        <td><?=$info['update_time']?></td>

					                        <td class="f-14 td-manage">
					                            <a class="ml-5 form-icon" href="<?=url('update',['uid'=>$info['uid']])?>" title="编辑"><i class="Hui-iconfont"></i></a>
					                            <a class="ml-5 do-del form-icon" data-url='<?=url("del")?>' href="javascript:;" title="删除"><i class="Hui-iconfont"></i></a>
					                        </td>
					                    </tr>
				                	<?php } } ?>
			                    
			                  
			                    
			                </tbody>
			            </table>
			            
			            <?=$page?>
			        	
			        </div>
				
			</div>

		</article>
	</div>
</section>


<script type="text/javascript" src="/static/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/hui/static/h-ui/js/H-ui.js"></script> 

<script type="text/javascript" src="/static/hui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/hui/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

$(function(){

	$("select[name='status']").val("<?php echo \think\Request::instance()->get('status'); ?>");

});

</script>

<script type="text/javascript" src="/static/hui/static/h-ui.admin/js/H-ui.admin.page.js"></script> 
</body>
</html>