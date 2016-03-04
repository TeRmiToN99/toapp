<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Блюдо: <?=$product['title']?></title>
    <script src="../includes/func.js"></script>
</head>
<body>
    <div class="container">
       <div class="cart_product">
            <h2>Блюдо: <?php echo $product['title']?></h2>
            <div style="float:left;">
                <em>Создано: <?=$product['add_date']?></em>
                <p>Вес: <?=$product['weigth']?></p>
           </div>
           <div><a href="../../images/products/full/<?=$product['img_path']?>"><img src="../../images/products/small/<?=$product['img_path']?>"></a></div>
           <div class="description"><?=$product['description']?></div>
           <div class="content"><?=$product['content']?></div>

           <!--<button onclick="addRow()">Добавить строку</button><hr><br>-->
           <div><button>Сохранить</button>
           <button onclick="javascript:history.go(-1)">Отменить</button></div>        
        </div>
    </div>
</body>
</html>