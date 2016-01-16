<?php
namespace Common\Controller;
use Think\Controller;

class AdminController extends Controller
{
    public  function _initialize(){
            $this->authority();    //权限控制
            $this->menu();         //菜单
    }

    //权限管理
    protected function authority(){
        //不是管理员  跳到登陆界面
        session('admin_user',1);
        if(!session('admin_user')){
              $this->redirect('Admin/Login/login');
        }
    }

    /*菜单*/
    protected function menu(){
            $this->navMenu();
            $this->moduleMenu();
    }

    //导航菜单
    protected function  navMenu(){
        if(!S('navMenu')){
            S('navMenu',C('navMenu'));
        }
    }

    //模块菜单
    protected function  moduleMenu(){
        if(!S('moduleMenu')){
            S('moduleMenu',C('moduleMenu'));
        }
      //  return  S('moduleMenu');
    }

    //子菜单
    protected function  subMenu(){
        if(!S('navMenu')){
            S('navMenu',C('navMenu'));
        }
        return  S('navMenu');
    }
}
