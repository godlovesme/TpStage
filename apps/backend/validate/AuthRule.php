<?php
/**
 * 权限
 */
namespace app\backend\validate;

use think\Validate;

class AuthRule extends Validate
{
    protected $rule =   [
        'title'   => 'require',
        'name'    => 'require',
        'pid'     => 'require',
        'sort'    => 'require',
        'is_menu' => 'require',
        'status'  => 'require',
    ];
    
    protected $message  =   [
        'title.require' => '标题必须',
        'name.require' => '规则标识必须',
        'pid.require' => '上级ID必须',
        'sort.require' => '排序必须',
        'is_menu.require' => '是否为菜单必须',
		'status.require' => '状态必须',
    ];

	protected $scene = [
        'add'   =>  ['title','name','pid','sort','is_menu','status'],
        'update'   =>  ['title','name','pid','sort','is_menu','status'],
    ];

}