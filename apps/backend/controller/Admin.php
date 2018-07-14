<?php
/**
* 管理员
*/

namespace app\backend\controller;

use think\Controller;
use think\Request;
use app\backend\model\Admin as AdminModel;

class Admin extends Backend
{	

    public function index(){
    	
        $postArr = $this->request->param();

        $adminModel = new AdminModel();
        
        if(!empty($postArr)){
            foreach ($postArr as $k=>$vo) {
                if($vo!=='' && in_array($k, ['nickname','email','weixin'])){
                    $adminModel->where($k,'like',"%".$vo.'%');
                }
            }
            if(isset($postArr['status']) && $postArr['status']!==''){
                $adminModel->where('status',intval($postArr['status']));
            }
        }else{
             $adminModel->where('status','>=',0);
        }

        $list = $adminModel->order('uid desc')->paginate(15,false,['query'=>$postArr]);

        foreach ($list as $key => $value) {
           $list[$key]->append(['status_text']);
        }

        // 获取分页显示
        $page = $list->render();
        // 模板变量赋值
        $this->assign('list', $list->toArray());
        $this->assign('page', $page);

    	return $this->fetch();
    }
  
    //添加
    public function add(){
        if($this->request->isPost()){
            return $this->operate();
        }else{
            return $this->fetch('operate');
        }
        
    }

    //修改
    public function update(){
        if($this->request->isPost()){
            return $this->operate();
        }else{
            $uid = $this->request->param('uid');
            if(empty($uid)){
                $this->error('ID 为空');
            }

            $info = AdminModel::get($uid)->toArray();
            $this->assign('info',$info);

            return $this->fetch('operate');
        }
    }

    private function operate(){
    
        if($this->request->isPost()){
            
            $postArr = $this->request->post();

            $uid = $postArr['uid'];

            if(empty($uid)){
                
                $adminModel = new AdminModel;
                $do = $adminModel->addInfo($postArr);
                
                if(!is_numeric($do)){
                    return json(['status'=>0,'msg'=>$do]);
                }

                return json(['status'=>1,'msg'=>"添加成功",'url'=>url('index')]);
            }else{

                $adminModel = new AdminModel;
                if(empty($postArr['password'])){
                    unset($postArr['password']);
                }

                $do = $adminModel->updateInfo(['uid'=>$uid],$postArr);
                
                if(!is_numeric($do)){
                    return json(['status'=>0,'msg'=>$do]);
                }

                return json(['status'=>1,'msg'=>"修改成功",'url'=>url('index')]);
            }

        }
    
    }

    //删除
    public function del(){

        if(!$this->request->isAjax()){
            return json(['status'=>0,'msg'=>"非法"]);
        }

        $ids = $this->request->post('ids');
        if(empty($ids)){
            return json(['status'=>0,'msg'=>"参数有误"]);
        }

        $do = AdminModel::_update_status(['uid'=>['in',$ids]],-1);
        if($do){
            return json(['status'=>1,'msg'=>"删除成功"]);
        }
            
        return json(['status'=>0,'msg'=>"删除失败"]);
    
    }



}