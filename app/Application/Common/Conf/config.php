<?php
return array(
	//'配置项'=>'配置值'
	//缓存配置
	     'DB_FIELD_ON'=>false,
    //	     'HTML_CACHE_ON'=>false,
	//数据库配置

		 'DB_TYPE'  => 'mysql',
		 'DB_USER'  => 'peter',
		 'DB_PWD'   => '123456',
		 'DB_HOST'  => '120.27.102.51',
		 'DB_PORT'  => '3306',
		 'DB_NAME'  => 'auto_thinkphp',
		 'DB_PREFIX'  => 'tt_',
	//密钥
		 'SECRET_KEY' => 'lecibupi',
	//表单令牌配置
		 'TOKEN_ON'    =>    true,//开启
	//模版配//模版配置
		 'TMPL_PARSE_STRING'  =>array(
			//'__PUBLIC__'    => __ROOT__.'Public/',
			'__AMAZEUI__'   => __ROOT__.'/Public/amazeui',
			//
			//'__AMAZEUI__'   => __ROOT__.'Public/amazeui/',
		 ),
);
