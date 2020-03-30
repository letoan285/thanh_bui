<?php 
require_once "./Product.php";


$product = new Product();

$product->name = $_POST['name']; 
$product->price = $_POST['price']; 
$product->description = $_POST['description'];
$fileName = "";
$file = $_FILES['image'];
if($file['size'] > 0){
    $fileName = "uploads/".time()."-".$file['name'];
    move_uploaded_file($file['tmp_name'], $fileName);
}
$product->image = $fileName; 
$product->slug = $_POST['slug']; 
$product->category_id = $_POST['category_id']; 
$product->stock = $_POST['stock']; 
$product->status = $_POST['status']; 

$product->save();
header("location: index.php");