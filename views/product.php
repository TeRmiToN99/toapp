<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Блюдо: <?=$product['title']?></title>
</head>
<body>
    <div class="container">
       <div class="cart_product">
            <h1>Блюдо: <?php echo $product['title']?></h1>
              <div>
                <em>Создано: <?=$product['add_date']?></em>
                <p>Вес: <?=$product['weigth']?></p>
               </div>
               <div><a href="../../images/products/full/<?=$product['img_path']?>"><img src="../../images/products/small/<?=$product['img_path']?>"></a></div>
               <div class="description"><p><?=$product['description']?></p></div>

                </div>
        <div>
        <a href="javascript:history.go(-1)"style=" text-decoration:none " >Назад</a>
        </div>
    </div>
</body>
</html>