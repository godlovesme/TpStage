<?php
/**
 * 角色管理员
 */
namespace app\backend\validate;

use think\Validate;

class AdminGroup extends Validate
{
    protected $rule =   [
        'title'  => 'require|max:25',
        'rules'  => 'require',
    ];
    
    protected $message  =   [
        'title.require' => '名称必须',
		'rules.require' => '权限必须',
		'title.max'     => 'title最多不能超过25个字符',
    ];

	protected $scene = [
        'add'   =>  ['title','rules'],
        'update'   =>  ['title','rules'],
    ];

}