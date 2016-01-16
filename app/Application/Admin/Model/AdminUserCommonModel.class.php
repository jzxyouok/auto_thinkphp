<?php
namespace  Admin\Model;
use         Think\Model;

class  AdminUserCommonModel  extends  Model
{
      protected $tableName  =  'admin_user_common';
      public function index(){
         echo 'admin_user_common_model';
      }

}
