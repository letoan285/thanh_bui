<?php
require_once "./BaseModel.php";

class Product extends BaseModel {
    protected $table = 'products';
    protected $columns = ['name', 'description', 'slug', 'category_id', 'price', 'image', 'stock', 'status'];

}
