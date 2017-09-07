<?php

//роуты - запросс клиента в строке - и запрос, где узнаем как обрабатывать
//маршруты
return array(

    'news/([0-9]+)' => 'news/view/$1', //actionView в NewController
    'news' => 'news/index', // actionIndex в NewController


//    'products' => 'product/list', // actionList в ProductControllet
//    'new/archive' => 'news/archive',
);

