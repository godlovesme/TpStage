<?php
/**
* 后台基础类
*/

namespace app\backend\controller;

use think\Controller;
use think\Request;
use think\Session;

class Backend extends Controller
{	
	//用户ID
    public $uid = NULL;
    //菜单
    public $menuList = array();

	/*初始化*/
	public function _initialize()
    {

        $this->uid = session('uid');
        define('UID', $this->uid);

        if(empty($this->uid)){
            $this->redirect('Login/index');
        }

        /*权限*/
        $backend_auth = config('backend_auth');
		$this->auth = new \org\Auth($backend_auth);

		$request = $this->request;

		$ACCESS_URL  = strtolower($request->module().'/'.$request->controller().'/'.$request->action());
		define('ACCESS_URL', $ACCESS_URL);

		if(!$this->auth->check(ACCESS_URL, $this->uid)){
			//未通过
            $this->error('没有权限');
		}

		// 动态绑定属性 菜单
		$request->bind('menuList',$this->auth->getMenu(UID));
        $request->bind('menuPidArr',$this->auth->getMenuAndPid(UID));
		$request->bind('selectMenu',$this->auth->selectMenu($this->request->param('module_menu_id')));

        $this->assign([
        	'title'=>"欢迎来到管理后台"
        ]);


    }


}