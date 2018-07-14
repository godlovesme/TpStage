<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:49:"E:\git\TpStage/apps/backend\view\index\index.html";i:1531559979;s:49:"E:\git\TpStage\apps\backend\view\common\base.html";i:1531559955;s:51:"E:\git\TpStage\apps\backend\view\common\header.html";i:1531559973;s:49:"E:\git\TpStage\apps\backend\view\common\menu.html";i:1531106323;}*/ ?>
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
        首页
        <span class="c-999 en">&gt;</span>
        <span class="c-666">我的桌面</span>
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新">
            <i class="Hui-iconfont">&#xe68f;</i></a>
    </nav>
    <div class="Hui-article">
        <article class="cl pd-20">
            
            <p class="f-20 text-success">欢迎使用 TpStage
                <span class="f-14">v1.0</span>后台模版！</p>
            <p>登录次数：<?php echo \think\Session::get('userInfo.login_num'); ?></p>
            <p>登录IP：<?php echo long2ip(\think\Session::get('userInfo.last_login_ip')); ?> 登录时间：<?php echo \think\Session::get('userInfo.last_login_time'); ?></p>
            <table class="table table-border table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th colspan="7" scope="col">
                            <span class="label label-success">信息统计</span></th>
                    </tr>
                    <tr class="text-c">
                        <th>统计</th>
                        <th>资讯库</th>
                        <th>图片库</th>
                        <th>产品库</th>
                        <th>用户</th>
                        <th>管理员</th></tr>
                </thead>
                <tbody>
                    <tr class="text-c">
                        <td>总数</td>
                        <td>92</td>
                        <td>9</td>
                        <td>0</td>
                        <td>8</td>
                        <td>20</td></tr>
                    <tr class="text-c">
                        <td>今日</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td></tr>
                    <tr class="text-c">
                        <td>昨日</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td></tr>
                    <tr class="text-c">
                        <td>本周</td>
                        <td>2</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td></tr>
                    <tr class="text-c">
                        <td>本月</td>
                        <td>2</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td></tr>
                </tbody>
            </table>
            <table class="table table-border table-bordered  mt-20 table-striped table-hover">
                <thead>
                    <tr>
                        <th colspan="2" scope="col">
                            <span class="label label-primary">服务器信息</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($info as $key => $value) { ?>
                        <tr>
                            <td><?php echo $key; ?></td>
                            <td><?php echo $value; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </article>
        <footer class="footer">
            <p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch
                <br>Copyright &copy;2015 H-ui.admin v3.0 All Rights Reserved.
                <br>本后台系统由
                <a href="http://www.h-ui.net/" target="_blank" title="H-ui前端框架">H-ui前端框架</a>提供前端技术支持</p>
        </footer>
    </div>
</section>


<script type="text/javascript" src="/static/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/hui/static/h-ui/js/H-ui.js"></script> 

<script type="text/javascript">

</script>

<script type="text/javascript" src="/static/hui/static/h-ui.admin/js/H-ui.admin.page.js"></script> 
</body>
</html>