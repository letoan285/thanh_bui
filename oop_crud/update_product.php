<?php 
require_once "./Product.php";

$id = $_GET['id'];


$product = Product::find($id);

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
            <h3 class="text-center mt-5">Update - <?=$product->name?></h3>
                <form action="save_update_product.php" method="POST">
                    <input type="hidden" value="<?=$product->id?>" name="id">
                    <div class="form-group">
                        <label for="">Product name</label>
                        <input name="name" type="text" class="form-control" value="<?=$product->name?>">
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input name="image" type="text" class="form-control" value="<?=$product->image?>">
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input name="slug" type="text" class="form-control" value="<?=$product->slug?>">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea  name="description" class="form-control" id="" cols="30" rows="10"><?=$product->description?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name="price" class="form-control" value="<?=$product->price?>">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <option value="3">Category 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                       <button type="submit" class="btn btn-block btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>