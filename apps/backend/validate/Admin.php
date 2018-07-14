<?php
/**
 * 管理员
 */
namespace app\backend\validate;

use think\Validate;

class Admin extends Validate
{
    protected $rule =   [
        'nickname'  => 'require|max:25',
        'password'   => 'require',
        'email' => 'require|email',    
        'sex' => 'require|in:男,女',    
        'weixin' => 'require',    
    ];
    
    protected $message  =   [
		'nickname.require' => '昵称必须',
		'password.require' => '密码必须',
		'email.require'    => '邮箱必须',
		'sex.require'      => '性别必须',
		'weixin.require'   => '微信号必须',
		'nickname.max'     => '昵称最多不能超过25个字符',
    ];

	protected $scene = [
        'add'   =>  ['nickname','password','email','sex','weixin'],
        'update'   =>  ['nickname','email','sex','weixin'],
    ];

}