<?php
return [
	  'id' => 'shop', //Идентификатор магазина
	  'basePath' => dirname(__DIR__),  
	  'controllerNameSpace'=>'frontend\controller\\',
	  'defaultRoute'=>[			//маршрут по умолчанию
	  		'controller'=>'site',
	        'action'=>'index'
	   ],

	];