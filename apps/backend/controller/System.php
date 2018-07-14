<?php
/**
* 系统管理
*/

namespace app\backend\controller;

use think\Controller;
use think\Request;

class System extends Backend
{	
	
    
	
    public function index(){
    	
    	return $this->fetch();
    }
  
    public function operate(){
    	
    	return $this->fetch();
    }


    public function outWord(){
        
        return $this->fetch();
    }
}