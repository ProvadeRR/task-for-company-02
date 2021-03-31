<?php
require_once 'classes/Database.php';

$db = new Database();
$categories = $db->row('SELECT * from category');
for($i = 0 ; $i < count($categories); $i++){
    $categories[$i]['products'] = $db->row('SELECT * FROM product WHERE category_id = :id' , ['id' => $categories[$i]['category_id']]);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testovoe_zadanie_02</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                        <h1 class="main__title">Тестовое задание 02</h1>
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>Товары</th>
                            <th>Кол-во</th>
                            <th>Цена</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><h5><?=$category['name'];?></h5></td>
                        </tr>
                            <?php foreach ($category['products'] as $product): ?>
                            <tr>
                                <td><a href='product.php?product_id=<?=$product['product_id']; ?>'><?=$product['name'];?></a></td>
                                <td><?=$product['quantity'] . ' шт.'?></td>
                                <td><?=$product['price'] . ' грн.'?></td>
                            </tr>
                            <?php endforeach;?>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
               <div style="width: 100%; text-align: center;">
                   <hr>
                   <div><pre>Сделал тестовое задание:<br><b>Станислав Карноза</b> 30.03.2021 </pre></div>
               </div>
        </div>
    </footer>
</body>
</html>
