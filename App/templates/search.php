<?php if (!empty($items)){foreach ($items as $item): ?>
    <a href="/products.php?action=FindById&product_id=<?php echo $item->id; ?>">
        <?php echo $item->title;?>
    </a><br>
    <?php endforeach;}else echo 'Совпадений не найдено!';?>
