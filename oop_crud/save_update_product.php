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



$product->update();

header("location: index.php");
