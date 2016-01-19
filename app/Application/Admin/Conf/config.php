<?php
return array(
	//'配置项'=>'配置值'
		//导航菜单
		'navMenu'=>array(
			'home'=>array(
				'name'=>'主页',
				'url' => U('admin/index/index'),
			),
			'user'=>array(
				'name'=>'用户',
				'url' => U('admin/user/index'),
			),
		),
		//模块菜单
		'moduleMenu'=>array(
			'cost'=>array(
				'name'=>'费用',
				'url' => U('admin/index/index'),
			),
			'car'=>array(
				'name'=>'车辆',
				'url' => U('admin/index/index'),
			),
		),
        'SUBMENU'=>array(
            array(
                 'title'=>'hello',
                 'list'=>array(
                      array('name'=>'hello1','url'=>'index'),
                      array('name'=>'hello2','url'=>'index'),
                      array('name'=>'hello3','url'=>'index'),
                      array('name'=>'hello4','url'=>'index'),
                 ),
            ),
            array(
                 'title'=>'world',
                 'list'=>array(
                      array('name'=>'world1','url'=>'admin/index/index'),
                      array('name'=>'world2','url'=>'admin/index/index'),
                      array('name'=>'world3','url'=>'admin/index/index'),
                      array('name'=>'world4','url'=>'admin/index/index'),
                 ),
            ),
        ),
);
