<?php
require_once "./Product.php";

$id = $_POST['id'];

$product = Product::find($id);
$product->name = $_POST['name'];
$product->slug = $_POST['slug'];
$product->image = $_POST['image'];
$product->price = $_POST['price'];
$product->category_id = $_POST['category_id'];
$product->description = $_POST['description'];
$data =array(
    "name" => $product->name,
    "slug" => $product->slug,
    "image" => $product->image,
    "price" => $product->price,
    "category_id" => $product->category_id,
    "description" => $product->description,
);

$product->update($id, $data);

header("location: index.php");
