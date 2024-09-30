<?php

class Category {
    public $name;
    private $products = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function displayProducts() {
        if (empty($this->products)) {
            echo "No products in this category.\n";
            return;
        }
        foreach ($this->products as $product) {
            echo $product->getInfo() . "\n\n";
        }
    }
}
