<?php
/**
* 后台登陆
*/

namespace app\backend\controller;

use think\Controller;
use think\Request;
use think\Db;

class Login extends Controller
{	
	
    
    public function index(){
    	return $this->fetch();
    }

    public function doLogin(){
    	if($this->request->isPost()){

    		$postArr = $this->request->post();

    		$email = trim($postArr['email']);
    		$password = trim($postArr['password']);
    		$verify_code = trim($postArr['verify_code']);

    		if(!captcha_check($verify_code)){
			 	return json(['status'=>0,'msg'=>"验证码错误"]);
			};

			$userInfo = model('admin')->where('email',$email)->find()->toArray();
			if(empty($userInfo)){
				return json(['status'=>0,'msg'=>"账户有误1"]);
			}
			if($userInfo['password']!=md5($password)){
				return json(['status'=>0,'msg'=>"账户有误2"]);
			}

			Db::name('admin')->where('uid', $userInfo['uid'])->update([
				'last_login_time' =>date('Y-m-d H:m:s'),
				'last_login_ip'=>ip2long($this->request->ip()),
				'login_num'=>Db::raw('login_num+1')
			]);
			session('userInfo',$userInfo);
			session('uid',$userInfo['uid']);
			return json(['status'=>1,'msg'=>"登陆成功",'url'=>url('Index/index')]);


    	}
    }
  	
  	public function logout(){
    	session('userInfo',null);
		session('uid',null);
		$this->redirect('Login/index');
    }

}