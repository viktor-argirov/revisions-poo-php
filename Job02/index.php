<?php

class Product {
    private $id;
    private $name;
    private $photos;
    private $price;
    private $description;
    private $quantity;
    private $createdAt;
    private $updatedAt;


    public function __construct($id,$name,$photos,$price,$description,$quantity,$createdAt,$updatedAt) {
        $this->id=$id;
        $this->name=$name;
        $this->photos=$photos;
        $this->price=$price;
        $this->description=$description;
        $this->quantity=$quantity;
        $this->createdAt=$createdAt;
        $this->updatedAt=$updatedAt;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPhotos() {
        return $this->photos;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setId($id){
        $this->id=$id;
        return $this;
    }

    public function setName($name){
        $this->name=$name;
        return $this;
    }

    public function setPhotos($photos){
        $this->photos=$photos;
        return $this;
    }

    public function setPrice($price){
        $this->price=$price;
        return $this;
    }

    public function setDescription($description){
        $this->description=$description;
        return $this;
    }

    public function setQuantity($quantity){
        $this->quantity=$quantity;
        return $this;
    }

    public function setCreatedAt($createdAt){
        $this->createdAt=$createdAt;
        return $this;
    }

    public function setUpdatedAt($updatedAt){
        $this->updatedAt=$updatedAt;
        return $this;
    }
}

// $product = new Product(1,"T-shirt",['https://picsus.photos/200/300'],1000,'A beautiful T-shirt',10, new DateTime(),new DateTime());

// var_dump($product->getId());
// var_dump($product->getName());
// var_dump($product->getPhotos());
// var_dump($product->getPrice());
// var_dump($product->getDescription());
// var_dump($product->getQuantity());
// var_dump($product->getCreatedAt()->format('Y:m:d H:i:s'));
// var_dump($product->getUpdatedAt()->format('Y:m:d H:i:s'));

// $product->setName('Nouveau Nom');
// $product->setPrice(150);
// $product->setQuantity(20);

// var_dump($product->getName());
// var_dump($product->getPrice());
// var_dump($product->getQuantity());


class Category {
    private $id;
    private $name;
    private $description;
    private $createdAt;
    private $updatedAt;

    public function __construct($id,$name,$description,$createdAt,$updatedAt){
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
        $this->createdAt=$createdAt;
        $this->updatedAt=$updatedAt;  
    }  

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setId($id){
        $this->id=$id;
        return $this;
    }

    public function setName($name){
        $this->name=$name;
        return $this;
    }

    public function setDescription($description){
        $this->description=$description;
        return $this;
    }

    public function setCreatedAt($createdAt){
        $this->createdAt=$createdAt;
        return $this;
    }

    public function setUpdatedAt($updatedAt){
        $this->updatedAt=$updatedAt;
        return $this;
    }
}

$product = new Product(1,"T-shirt",[''],1000,'A beautiful T-shirt',10, new DateTime(),new DateTime());
// $product1 = new Product();

var_dump($product->getId());
var_dump($product->getName());
var_dump($product->getDescription());
var_dump($product->getCreatedAt()->format('Y:m:d H:i:s'));
var_dump($product->getUpdatedAt()->format('Y:m:d H:i:s'));

$product->setName('Nouveau Nom');

var_dump($product->getName());

