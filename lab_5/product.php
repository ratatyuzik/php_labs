<?php

class Product {
    public $name;
    public $description;
    protected $price;

    public function __construct($name, $price, $description) {
        $this->name = $name;
        $this->setPrice($price);
        $this->description = $description;
    }

    public function setPrice($price) {
        if ($price < 0) {
            throw new InvalidArgumentException("Price cannot be negative.");
        }
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getInfo() {
        return "Назва: $this->name\nPrice: $this->price\nDescription: $this->description";
    }
}
