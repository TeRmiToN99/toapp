<?php if (!empty($items)){foreach ($items as $item): ?>
    <a href="/App/cpanel/products.php?action=FindById&product_id=<?php echo $item->id; ?>">
        <?php echo $item->title;?>
    </a><br>
    <?php endforeach;}else echo 'Совпадений не найдено!';?>
