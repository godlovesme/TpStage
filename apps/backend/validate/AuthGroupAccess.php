<?php
/**
 * 角色绑定
 */
namespace app\backend\validate;

use think\Validate;

class AuthGroupAccess extends Validate
{
    protected $rule =   [
        'uid'  => 'require',
        'group_id'  => 'require',
        'uid'   => 'unique:auth_group_access,uid^group_id',
    ];
    
    protected $message  =   [
        'uid.require' => '用户ID必须',
        'group_id.require' => '角色ID必须',
		'uid.unique' => '角色ID和用户ID是唯一的',
    ];

	protected $scene = [
        'add'   =>  ['uid','group_id'],
        'update'   =>  ['uid','group_id'],
    ];

}