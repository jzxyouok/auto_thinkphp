<?php
namespace User\Controller;
use Think\Controller;
/*
 *   用户登陆
 */
class IndexController extends Controller
{
    public function _initialize(){
        dump(is_login());
    }
    //用户中心
    public function index()
    {
        //session('user',array('a'=>1,'b'=>4,'c'=>'sd'));
        //dump(D('User'));
        //$this->display();
    }

    public function register(){
        //if(IS_AJAX){
            //去登陆
            //$url  = I('server.HTTP_REFERER','');
            $data =  array(
                'username'    =>  'bbb',
                'password'    =>  '123456',
                'repassword'  =>  '123456',
                'email'       =>  'smartymoon@qq.com',
                'tel'         =>   18765909876,
                'idCard'      =>   '230304199111245015',
                'gender'      =>   0,
            );

            $res = D('User')->create($data);
            if(!$res){  //数据创建失败
                $error =  D('User')->getError();
                $this->ajaxReturn(array('status'=>0,'info'=>$error));
            }else{      //数据创建成功
                $res =  D('User')->add();
                if($res){
                    $info['uid']      = $res;
                    $info['email']    = $data['email']?$data['email']:'';
                    $info['tel']      = $data['tel']?$data['tel']:'';
                    $info['nickname'] = $data['nickname'];
                    $this->info2session($info);
                    $this->ajaxReturn(array('status'=>1,'info'=>'注册成功','url'=>I('server.HTTP_REFERER')));
                }else{
                    $error =  D('User')->getError();
                    $this->ajaxReturn(array('status'=>0,'info'=>$error));
                }
            }
            //$res  = D('User')->login();
            //$this->ajaxReturn(array('status'=>$res['status'],'info'=>$res['info'],'url'=>$url));
            //}else{
            //展示登陆界面
            //$this->display();
            //}
    }

    public function login(){
        //判断账户
        $d_user = D('User');
        if($usernameType = $d_user->getUsernameType()){
            if($usernametype == 'email'){
                  $res =  $d_user->loginByEmail($data);
            }elseif($usernameType == 'tel'){
                  $res = $d_user->loginByTel($data);
            }

            if($res){

            }else{

            }
        }else{
           $this->ajaxReturn(array('status'=>0,'info'=>'用户名格式不正确，请输入正确的电话或邮箱'));
        }
    }

    public function  logout(){
         session('user_info',null);
    }
    //将信息存入session
    /*   $Info   uid,nickname,logintime
     *
     */
    public function  info2session($info){
         session('user_info',$info);
    }
}
