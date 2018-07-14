<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:50:"E:\git\TpStage/apps/backend\view\widget\image.html";i:1531466503;s:52:"E:\git\TpStage/apps/backend\view\widget\ueditor.html";i:1531560384;}*/ ?>


<script id="<?php echo $id; ?>" type="text/plain" name='<?php echo $name; ?>' style="width:100%;height:400px;"><?php echo $content; ?></script> 


<?php if($one){ ?>
<script type="text/javascript" src="/static/hui/lib/ueditor/1.4.3/ueditor.config.js"></script> 
<script type="text/javascript" src="/static/hui/lib/ueditor/1.4.3/ueditor.all.min.js"></script> 
<script type="text/javascript" src="/static/hui/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<?php } ?>


<script type="text/javascript">
	var ue = UE.getEditor('<?php echo $id; ?>',{
		 autoHeightEnabled: false
	});
</script>