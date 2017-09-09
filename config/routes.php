<?php

//роуты - запросс клиента в строке - и запрос, где узнаем как обрабатывать
//маршруты
return array(
    'product/([0-9]+)' => 'product/view/$1', //actionIndex в ProductController

    'catalog/page-([0-9]+)' => 'catalog/index/$1', //actionIndex в CatalogControllet

    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //actionCategory в CatalogController
    'category/([0-9]+)' => 'catalog/category/$1', //actionCategory в CatalogController

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    '' => 'site/index', //actionIndex в SiteControllet
);

