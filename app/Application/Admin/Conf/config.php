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
);
