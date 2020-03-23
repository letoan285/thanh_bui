<?php
require_once "./Product.php";
require_once "./User.php";
require_once "./Category.php";

// $products = Product::where(['name', 'like', '%op%'])
//     ->andWhere(['id', '>', 10])
//     ->orWhere(['image', 'like', '%a%'])->get();
// var_dump($products);die;

// $model = new Product();

// var_dump($model->find(1)); die;

$products = Product::all();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <table class="table table-bordered">
                <h3 class="text-center mt-5">Product List</h3>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th><a class="btn btn-sm btn-success" href="/products/create">Create New</a></th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach ($products as $key => $product): ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><a href="product_detail.php?id=<?=$product->id?>"><img width="80" src="<?=$product->image ?>" alt=""></a> </td>
                        <td><?= $product->name  ?></td>
                        <td><?= $product->price?></td>
                        <td><?= $product->category_id?></td>
                        <td>
                        <a class="btn btn-sm btn-info" href="update_product.php?id=<?=$product->id?>">Edit</a>
                        <a class="btn btn-sm btn-danger" href="delete_product.php?id=<?=$product->id?>">Del</a>
                        </td>
                    </tr>
                <?php endforeach ?>
                    
                </tbody>
            </table>
            </div>
        </div>
    </div>
</body>
</html>