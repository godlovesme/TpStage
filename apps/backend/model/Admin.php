<?php
/**
 * 管理员
 */
namespace app\backend\model;

use think\Model;

class Admin extends ModelCommon
{

	//新增时自动完成
	protected $insert = ['add_time','password'];  

	protected function setPasswordAttr()
    {
        return md5(trim(request()->post("password")));
    }
}