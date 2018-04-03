<?php
require __DIR__ . '/../../autoload.php';
$title= trim(strip_tags(stripcslashes(htmlspecialchars($_POST['referal']))));
if($title != ' ') {
    $items = \App\cpanel\Models\Product::search($title);
    var_dump($items);
    die;
    include_once __DIR__ . '/App/cpanel/templates/search.php';


/*    if (!empty($items)){
        foreach ($items as $item):
            echo('<a href="../../products.php?action=FindById&product_id=');
            echo $item->id;
            echo ('">');
            echo $item->title;
            echo ('</a>');
        endforeach;
    }
}else echo 'ничего не найдено!';*/
}