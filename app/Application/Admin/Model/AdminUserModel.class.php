<?php
namespace  Admin\Model;
use        Think\Model;
class  AdminUserModel  extends  Model
{
    protected $tableName    =  'admin_user';
    protected $loginMessage ;

    protected $_auto = array(
         array('create_time',NOW_TIME),
         array('status',1),
         array('password','initPassword',self::MODEL_INSERT,'callback'),
    );

    protected  $_validate = array(
        array('tel','require','电话必须有'),
        array('tel','','电话已经存在',1,'unique'),
    );

    public function  login($tel,$password){
       $nameCorrect = $this->getFieldBytel($tel,'uid');
       if($nameCorrect){
           $map   =  array('tel'=>$tel,'password'=>$password);
           return  $this->getUserInfo($map);
       }else{
           $this->$loginMessage = '账户不存在';
       }
       return false;
    }

    private  function  getUserInfo($map){
           $info  =  $this->where($map)->find();
           //正常，禁用，不存在
           if($info == NULL){
                 $this->$loginMessage = '密码错误';
           }elseif($info['status'] == -1){
                 $this->$loginMessage = '用户已被禁用';
                 return $info;
           }elseif($info['status'] == 0){
                 $this->$loginMessage = '用户未激活';
                 return  $info;
           }elseif($info['uid']){
                 $this->$loginMessage = '登陆成功';
                 return $info;
           }else{
                 $this->$loginMessage = '登陆出错';
           }
           return false;
    }

    //增加用户
    public function  addUser($data){
            $uid = $this->add($data);
            if($uid){
                $this->initUser($uid); //初始化用户应用
                return  true;
            }else{
                return  false;
            }
    }

    //初始化密码
    public function initPassword(){
           return $this->getPassword(123456);
    }

    //得到加密密码
    public function getPassword($password){
          return  D('User/User')->encrypt($password);
    }

    //初始化用户，改变出admin_user表以外的其他表
    protected function initUser(){
           //TODO
    }
}
