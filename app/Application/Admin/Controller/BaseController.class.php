<?php
namespace Admin\Controller;
use       Common\Controller\AdminController;
class BaseController extends AdminController
{
    public function _initialize()
    {
         //生成子菜单
        $this->subMenu();
    }

    protected function  subMenu(){
         /* $subMenu = C('SUBMENU'); */
         /*  $this->assign('subMenu') */
    }
}
