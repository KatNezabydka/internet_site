<?php

class Cart
{
    //Добавление товара в корзину (сессию)
    //Возвращает количество товара, которое находится на данный момент в корзине
    public static function addProduct($id)
    {
        $id = intval($id);

        // Пустой массив для товаров в корзине
        $productsInCart = array();

        // Если в корзине уже есть товары (они хранятся в сессии)
        if (isset($_SESSION['products'])) {
            //То заполним наш массив товарами
            $productsInCart = $_SESSION['products'];
        }

        // Если товар есть в корзине, но был добавлен еще раз, увеличим количество

        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id]++;
        } else {
            // Добавляем нового товара в корзину
            $productsInCart[$id] = 1;
        }

        $_SESSION['products'] = $productsInCart;

        return self::countItems();

    }

    // Удвление товара из корзины (сессии)
    //Возвращает количество товара, которое находится на данный момент в корзине
    public static function deleteProduct($id)
    {
        $id = intval($id);

        // Если в корзине уже есть товары (они хранятся в сессии)
        if (isset($_SESSION['products'])) {
            if (array_key_exists($id, $_SESSION['products'])) {
                $_SESSION['products'][$id]--;
            }
            if ($_SESSION['products'][$id] === 0) unset($_SESSION['products'][$id]);
        }

        return self::countItems();

    }

    //Считает количество товара в сессии
    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            //$id - идентификатор товара ; $quantity = количество
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else return 0;
    }

    // Возвращаем содержимое сесиии - массив, если оно есть

    public static function getTotalPrice($products)
    {
        //Получаем товары из сессии
        $productsInCart = self::getProducts();
        //если они есть, подсчитываем общую стоимость товаров
        if ($productsInCart) {
            $total = 0;
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }
        return $total;
    }

    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

}