<?php
namespace Home\Controller;

use Think\Controller;
use Think;

class IndexController extends Controller
{
    public function index()
    {
     $this->display();
    }

    public function show()
    {
        echo 'abc';
    }
}
