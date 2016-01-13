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
           array('password','encrypt',self::MODEL_INSERT,'callback'),
           array('status',1),
    );

    protected   $_validate =  array(
          array('nickname','require','昵称必须有!',1),
          array('nickname','','昵称已被使用!',1,'unique',1),

          array('tel','','电话已被使用!',0,'unique',1),
          array('email','','邮箱已被使用!',0,'unique',1),  //二有一就可以

          array('password','6,20','密码长度在6位以上!',1,'length'),
          array('password','require','密码必须有!',1),
          array('password','checkPwd','密码格式不正确',1,'function'),
          array('repassword','password','确认密码不正确',1,'confirm'),
          array('email','email','邮箱格式不正确!',0),
          array('tel','is_tel','手机格式不正确!',0,'callback',),
          array('idCard','is_idCard','身份证格式不正确',0,'callback'),
    );

    public  $loginMessage = NULL ;
    protected  function is_tel($str){
			$isMatched = preg_match('/^(13|14|15|18|17)[0-9]{9}/', $str, $matches);
			return (bool)$isMatched;
    }

    protected  function  is_IdCard($str){
		$isMatched = preg_match('/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$|^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/', $str, $matches);
        return (bool)$isMatched;
    }

    protected function   is_email($str){
       $isMatched = preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',$str,$matches);
       return (bool)$isMatched;
    }

    protected  function  get_ip(){
        return  I('server.REMOTE_ADDR');
    }

     //给密码加密
    public  function  encrypt($password){
           $secret_key = C("SECRET_KEY");
           $password = md5($secret_key.$password);
           return $password;
    }

    //获得账号类型，电话或者邮箱
    public function getUsernameType($username){
        if($this->is_tel($username)){
            return 'tel';
        }elseif($this->is_email($username)){
            return 'email';
        }else{
            return false;
        }
    }

    //通过手机登陆
    public function   loginByTel($tel,$password){
       $nameCorrect =  $this->where(array('tel'=>$tel))->getFieldBytel($tel,$id);
       if($nameCorrect){
           $map   =  array('tel'=>$tel,'password'=>$password);
           $res   =  $this->getUserInfo($map);
           return $res;
       }else{
             $this->$loginMessage = '电话不存在';
       }
       return false;
    }


    //通过email登陆
    public function   loginByEmail($email,$password){
       $nameCorrect = $this->where(array('email'=>$email))->getFieldByemail($email,$id);
       if($nameCorrect){
           $map   =  array('email'=>$email,'password'=>$password);
           return  $this->getUserInfo($map);
       }else{
           $this->$loginMessage = '邮箱不存在';
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
}
