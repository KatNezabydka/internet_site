<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';
include_once ROOT . '/components/Pagination.php';


class CatalogController
{

    public function actionIndex($page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(Product::SHOW_BY_DEFAULT, $page);

        //колчество, сколько строк там
        $total = Product::getTotalProducts();

        //Создаем объект Pagination - постраничная навигация
        //1)общее количество товаров конкретной категории
        //2) номер страницы, который к нам попадает
        //3) константа - количество товаров на странице
        //4) ключ, который фигурирует в нашем url
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }

    //в зависсимости от номера страницы, на этой странице
    public function actionCategory($categoryId, $page = 1)
    {

        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);
        //общее количество товаров конкретной категории
        $total = Product::getTotalProductsInCategory($categoryId);

        //Создаем объект Pagination - постраничная навигация
        //1)общее количество товаров конкретной категории
        //2) номер страницы, который к нам попадает
        //3) константа - количество товаров на странице
        //4) ключ, который фигурирует в нашем url
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/category.php');

        return true;
    }
}