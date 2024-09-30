<?php

require_once 'Product.php';
require_once 'DiscountedProduct.php';
require_once 'Category.php';

$product1 = new Product("Product1", 100, "Product description 1");
$product2 = new DiscountedProduct("Product2", 200, "Product description 2", 50);

$category = new Category("Category 1");
$category->addProduct($product1);
$category->addProduct($product2);

echo "Products in category: '{$category->name}':\n\n";
$category->displayProducts();
