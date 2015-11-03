<?php
return [
	  'id' => 'backend.shop', //Идентификатор магазина
	  'basePath' => dirname(__DIR__),  
	  'controllerNameSpace'=>'backend\controller\\',
	  'defaultRoute'=>[			//маршрут по умолчанию
	  		'controller'=>'site',
	        'action'=>'index'
	   ],

	];