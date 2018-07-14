<?php
/**
 * 公共模型
 */
namespace app\backend\model;

use think\Model;

class ModelCommon extends Model
{

	public $status_arr = [-1=>'删除',0=>'禁用',1=>'正常',2=>'待审核'];

	protected $datetime_format = false;
	//自动完成[新增和修改时都会执行]
	protected $auto = ['update_time'];
	//新增时自动完成
	protected $insert = ['add_time'];  
	//修改时自动完成
	protected $update = [];  

	protected function setUpdateTimeAttr()
	{
	    return date('Y-m-d H:i:s');
	}
	protected function setAddTimeAttr()
	{
	    return date('Y-m-d H:i:s');
	}

	public function getStatusTextAttr($value,$data)
    {
        return $this->status_arr[$data['status']];
    }

	//自定义初始化
	protected function initialize()
	{
	    //需要调用`Model`的`initialize`方法
	    parent::initialize();
	    //TODO:自定义的初始化
	}

	//自定义初始化
	protected static function init()
	{

	    /*事件*/
		// beforeInsert    新增前
		// afterInsert     新增后
		// beforeUpdate    更新前
		// afterUpdate     更新后
		// beforeWrite     写入前
		// afterWrite  	   写入后
		// beforeDelete    删除前
		// afterDelete     删除后
		// 事件方法如果返回false，则不会继续执行。
	    /*新增前*/
	    self::event('before_insert', function ($data) {
	        // if ($data->status != 1) {
	        //     return false;
	        // }
	    });

	}


	//静态 后台通用 添加
	static public function _add($data){
		if(empty($data)){
			return false;
		}
		$model = self::create($data);
		$pk = $model->pk;
		return $model->$pk;
	}

	//静态 后台通用 修改
	static public function _update($where,$data){
		if(empty($where) || empty($data)){
			return false;
		}
		return self::get($where)->update($data);
	}

	//静态 后台通用 删除
	static public function _del($query){
		if(empty($query)){
			return false;
		}
		return self::destroy($query);
	}

	//静态 后台通用 修改状态
	static public function _update_status($where,$status){
		if(empty($where) || empty($status)){
			return false;
		}

		return self::where($where)->update(['status'=>$status]);
	}


	//后台通用 添加 验证
	public function addInfo($data,$validate=''){
		if(empty($data)){
			return false;
		}
		if($validate){
			$this->validate($validate.'.update');
		}else{
			$ModelName = end(explode("\\",get_called_class()));
			$this->validate($ModelName.'.update');
		}
		$result = $this->save($data);
		if(false === $result){
		    return $this->getError();
		}
		$pk = $this->pk;
		return $this->$pk;
	}

	//后台通用 更新
	public function updateInfo($where,$data,$validate=''){
		if(empty($where) || empty($data)){
			return false;
		}
		if($validate){
			$this->validate($validate.'.update');
		}else{
			$ModelName = end(explode("\\",get_called_class()));
			$this->validate($ModelName.'.update');
		}
		$result = $this->save($data,$where);
		if(false === $result){
		    return $this->getError();
		}
		return $result;
	}

	//后台通用 删除
	public function delInfo($query){
		if(empty($query)){
			return false;
		}
		return self::destroy($query);
	}


}