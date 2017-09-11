<?php


class CartController
{
    //Обработка ассинхронного запроса
    public function actionAdd($id)
    {
        //Добавляем товар в корзину
        Cart::addProduct($id);

        // Возвращаем пользователя на страницу с которой он пришел
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
        exit();
    }

    //Обработка ассинхронного запроса AJAX
    public function actionAddAjax($id)
    {
        // Добавляем товар в корзину
        echo Cart::addProduct($id);
        return true;
    }

    public function actionIndex()
    {
        //список категорий слева
        $categories = array();
        $categories = Category::getCategoriesList();

        $productsInCart = false;

        // Получаем данные из корзины
        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            // Получаем полную информацю о товараз для списка id товара для поиска в БД
            $productsIds = array_keys($productsInCart);
            //Возвращает информацию о товарах по заданному идентификатору
            $products = Product::getProductsByIds($productsIds);

            // Получаем общую стоимость товаров
            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once(ROOT . '/views/cart/index.php');

        return true;
    }
}
