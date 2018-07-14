<?php
/**
 * 权限
 */
namespace app\backend\model;

use think\Model;

class AuthRule extends ModelCommon
{
    public $is_menu_arr = [0=>'否',1=>'是'];

    public function getIsMenuTextAttr($value,$data)
    {
        return $this->is_menu_arr[$data['is_menu']];
    }


	/**
	 * 返回权限节点
	 */
	public function getRuleTree($select_id_arr=array()){

		if(is_string($select_id_arr)){
			$select_id_arr = explode(',', $select_id_arr);
		}
	
        $ruleRes = $this->where('status','=',1)->field('id,pid as pId,title as name')->select()->toArray();

        $ruleRes = list_to_tree($ruleRes,'id','pId');

        $ruleArr = array();

        foreach ($ruleRes as $vo) {

            if(isset($vo['_child'])){
                foreach ($vo['_child'] as $voo) {
                    $voo['open'] = true;
                    
                    if(isset($voo['_child'])){
                        foreach ($voo['_child'] as $vooo) {

                            if(isset($vooo['_child'])){
                                foreach ($vooo['_child'] as $voooo) {
                                    if(in_array($voooo['id'],$select_id_arr)){
                                        $voooo['checked'] = true;
                                    }
                                    $ruleArr[] = $voooo;
                                }
                            }

                            unset($vooo['_child']);
                            $vooo['open'] = true;
                        	if(in_array($vooo['id'],$select_id_arr)){
		                    	$vooo['checked'] = true;
		                    }
                            $ruleArr[] = $vooo;
                        }
                    }
                    unset($voo['_child']);
                    if(in_array($voo['id'],$select_id_arr)){
                    	$voo['checked'] = true;
                    }
                    $ruleArr[] = $voo;

               }
            }
            $vo['open'] = true;
			unset($vo['_child']);
			if(in_array($vo['id'],$select_id_arr)){
				$vo['checked'] = true;
			}
			$ruleArr[] = $vo;
           
        }

        return $ruleArr;
	}

}