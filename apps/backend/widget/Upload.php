<?php
/**
 *  上传
 */

namespace app\backend\widget;
use think\Controller;
class Upload extends Controller{


	//图片上传
    public function webImage($name,$title,$one=true)
    {
    	
        return $this->fetch('widget/image',[
        	'name'=>$name,
        	'title'=>$title,
        	'one'=>$one,
        ]);
    }
    
}