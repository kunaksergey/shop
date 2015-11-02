<?php
define("__APP__", './../..'); //каталог приложения
define("__CORE__", './../../core');//каталог ядра
define("__ROOT__",__DIR__) ;

use \core\App;
$config=include_once('./../config/config.php'); //подключаем конфигурацию
include_once(__CORE__.'/autoload.php'); //подключаем автозагрузчик
include (__CORE__.'/App.php'); //подключаем ядро
App::init()->run($config); //инициализация приложения
