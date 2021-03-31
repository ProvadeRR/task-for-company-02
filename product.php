<?php

require_once 'classes/Database.php';

$product_id = $_GET['product_id'];
if(!is_numeric($product_id)){
    return header('location: index.php' );
}
else{
    $db = new Database();
    $product = $db->row('SELECT product.name as product_name,category.name as category_name, product.quantity, product.price,product.image FROM product JOIN category ON product.category_id = category.category_id WHERE product.product_id = :id' , ['id' => $product_id])[0];
    if(!$product){
        return header('location: index.php' );
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$product['product_name'];?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<section class="main">
    <div class="container">
        <h1 class="main__title">Тестовое задание 02</h1>
        <div class="col-lg-3">
            <div class="card">
                <img class="card-img-top" src="<?=$product['image'];?>" alt="Card image cap">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Название: <b><?=$product['product_name']?></b></li>
                    <li class="list-group-item">Категория: <b><?=$product['category_name']?></b></li>
                    <li class="list-group-item">Название: <b><?=$product['quantity'] . ' шт.'?></b></li>
                    <li class="list-group-item">Название: <b><?=$product['price']. ' грн.'?></b></li>
                </ul>
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



