<?php
/**
 *  编辑器
 */

namespace app\backend\widget;
use think\Controller;
class Editor extends Controller{


	//百度
    public function ueditor($id,$name,$content,$one=true)
    {

        return $this->fetch('widget/ueditor',[
        	'id'=>$id,
        	'name'=>$name,
        	'content'=>$content,
        	'one'=>$one,
        ]);
    }
    
}