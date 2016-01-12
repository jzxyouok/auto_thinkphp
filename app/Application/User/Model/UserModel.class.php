<?php
namespace User\Model;
use Think\Model;

class  UserModel extends  Model
{
    protected   $_auto     =  array(
           array('create_time',NOW_TIME),
           array('last_login_time',NOW_TIME,self::MODEL_INSERT),
           array('register_ip','get_ip',self::MODEL_INSERT,'callback'),
           array('last_ip','get_ip',self::MODEL_INSERT,'callback'),
           array('password','encrypt',self::MODEL_INSERT,'callback')
    );

    protected   $_validate =  array(
          array('nickname','require','昵称必须有!'),
          array('nickname','','昵称已被使用!',0,'unique',1),
          array('password','6,20','密码长度在6位以上!',0,'length'),
          array('password','require','密码必须有!',0),
          array('password','checkPwd','密码格式不正确',0,'function'),
          array('repassword','password','确认密码不正确',0,'confirm'),
          array('email','email','邮箱格式不正确!',0),
          array('tel','is_tel','手机格式不正确!',0,'callback',),
          array('idCard','is_idCard','身份证格式不正确',0,'callback'),
    );


    protected  function is_tel($str){
			$isMatched = preg_match('/^(13|14|15|18|17)[0-9]{9}/', $str, $matches);
			return (bool)$isMatched;
    }

    protected  function  is_IdCard($str){
		$isMatched = preg_match('/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$|^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/', $str, $matches);
        return (bool)$isMatched;
    }

    protected function   is_email(){
       $isMatched = preg_match( '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/');
       return (bool)$isMatched;
    }

    protected  function  get_ip(){
        return  I('server.REMOTE_ADDR');
    }

     //给密码加密
    protected  function  encrypt($password){
           $secret_key = C("SECRET_KEY");
           $password = md5($secret_key.$password);
           return $password;
    }

    //获得账号类型，电话或者邮箱
    public function getUsernameType($username){
        if($this->is_tel()){
            return 'tel';
        }elseif($this->is_email()){
            return 'email';
        }else{
            return false;
        }
    }
}
