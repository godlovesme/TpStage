<?php
/**
* Demo
*/

namespace app\backend\controller;

use think\Controller;
use think\Request;

class Demo extends Backend
{	
	
   
    public function index(){
    	 
    	return $this->fetch();
    }


  

}