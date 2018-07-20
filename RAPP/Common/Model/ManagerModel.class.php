<?php
		return !$this->where(array('user'=>$user))->field('id')->find();
	}
	/**
	 * 判断用户是否存在
	 * @param 用户名
	 * @return 存在返回记录，不存在返回false
	 * @author zjf
	 */
	public function exist_manager($mixuser){
		$where['user'] = $mixuser;
		return $this->where($where)->find();
	}
	/**
	 * 检测用户名密码是否合法
	 * @param array [用户名,密码]
	 * @return array [状态,详情]
	 * @author zjf
	 */
	public function check_account($arr){
		$res = $this->exist_manager($arr['user']);
		if(!$res){
			return array('status'=>0,'error'=>'用户名不存在！');
		}elseif($res['pass'] != md5($arr['pass'])){
			return array('status'=>0,'error'=>'密码不正确！');
		}else{
			return array('status'=>1,'data'=>$res);
		}
	}