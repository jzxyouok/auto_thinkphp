<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller
{
    public function login()
    {
        if(IS_POST){
              $this->display();
        }else{
              $d_AdminUser  = D('AdminUser');

              $tel      =  I('post.tel');
              $password =  D('Home/User')->encrypt(I('post.password'));

              $res =  $d_AdminUser->login($tel,$password);
              $loginMessage  = $d_AdminUser->loginMessage;

              if($res){
                  $this->ajaxReturn(array('status'=>1,'info'=>$loginMessage,'url'=>U('admin/index/index')));
              }else{
                  $this->ajaxReturn(array('status'=>0,'info'=>$loginMessage));
              }
        }
    }
}
