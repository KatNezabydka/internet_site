<?php

//роуты - запросс клиента в строке - и запрос, где узнаем как обрабатывать
//маршруты
return array(
    'product/([0-9]+)' => 'product/view/$1', //actionIndex в ProductController

    'catalog' => 'catalog/index', //actionIndex в CatalogControllet

    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //actionCategory в CatalogController
    'category/([0-9]+)' => 'catalog/category/$1', //actionCategory в CatalogController

    '' => 'site/index', //actionIndex в SiteControllet
);

