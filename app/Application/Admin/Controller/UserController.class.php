<?php
namespace Admin\Controller;
use Think\Controller;

//后台用户管理，专人才能访问这个类
class UserController extends Controller
{
    public function index(){

    }

    //增加用户
    public function  addUser(){
        if(IS_POST){
            $d_AdminUser  = D('AdminUser');
            /*测试数据*/
                 /* $_POST['nickname']  = '厉增伟'; */
                 /* $_POST['tel']       =   '18660352919'; */
            /*测试数据 end*/
            $data = $d_AdminUser->create();//根据模版传来的字段自动那个啥数据

            $url = '';
            $status = 0;
            $info =  '';
            if($data){
               $res = $d_AdminUser->addUser($data);
               dump($res);
               if($res){
                  $status = 1;
                  $info =  '新增成功';
                  $url  =   U('admin/index/index');
               }else{
                  $status = 0;
                  $info =  $d_AdminUser->getdberror();
               }
            }else{
                  $status = 0;
                  $info   = $d_AdminUser->getError();
            }
            $this->ajaxReturn(array('status'=>$status,'info'=>$info,'url'=>$url));
        }else{
            $this->display();
        }
    }
}
