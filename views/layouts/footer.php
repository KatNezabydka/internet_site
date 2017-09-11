<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2015</p>
                <p class="pull-right">Курс PHP Start</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->


<script src="/template/js/jquery.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<script src="/template/js/price-range.js"></script>
<script src="/template/js/jquery.prettyPhoto.js"></script>
<script src="/template/js/main.js"></script>
<script>
    //код будет выполнен после загрузки документа
    $(document).ready(function () {
        //нажатие на кнопку - добавить в корзину
        $(".add-to-cart").click(function () {
            //data-id это идентификатор товара, который нужно добавить в корзину
            var id = $(this).attr("data-id");
            //post - адресс, параметры, и функция, который обрабатывает результат
            //в data поступает количество товара в корзине и помещаем его в счетчик корзины
            $.post("/cart/addAjax/" + id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>

</body>
</html>