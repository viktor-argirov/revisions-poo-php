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
    private $id_category;

    public function __construct($id, $name, $photos, $price, $description, $quantity, $createdAt, $updatedAt, $id_category) {
        $this->id = $id;
        $this->name = $name;
        $this->photos = $photos;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->id_category = $id_category;
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

    public function getIdCategory() {
        return $this->id_category;
    }

    public function setIdCategory($id_category) {
        $this->id_category = $id_category;
        return $this;
    }
}

class Category {
    private $id;
    private $id_category;

    public function __construct($id, $id_category) {
        $this->id = $id;
        $this->id_category = $id_category;        
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getIdCategory() {
        return $this->id_category;
    }

    public function setIdCategory($id_category) {
        $this->id_category = $id_category;
        return $this;
    }


}

class clothing extends Product {
    private $size;
    private $color;
    private $type;
    private $material_fee;

    public function __construct($id, $name, $photos, $price, $description, $quantity, $createdAt, $updatedAt, $id_category,$size,$color,$type,$material_fee){
        parent::__construct($id, $name, $photos, $price, $description, $quantity, $createdAt, $updatedAt, $id_category);
        $this->size=$size;
        $this->color=$color;
        $this->type=$type;
        $this->material_fee=$material_fee;
    }

    public function getSize(){
        return $this->size;
    }
    public function setSize($size){
        $this->size=$size;
        return $this;
    }

    public function getColor(){
        return $this->color;
    }
    public function setColor($color){
        $this->color=$color;
        return $this;
    }

    public function getType(){
        return $this->type;
    }
    public function setType($type){
        $this->type=$type;
        return $this;
    }
    
    public function getMaterial_fee(){
        return $this->material_fee;
    }
    public function setMaterial_fee($material_fee){
        $this->material_fee=$material_fee;
        return $this;

    }
}

class Electronic extends Product{
    private $brand;
    private $warranty_fee;

    public function __construct($id, $name, $photos, $price, $description, $quantity, $createdAt, $updatedAt, $id_category,$brand,$warranty_fee){
        parent::__construct($id, $name, $photos, $price, $description, $quantity, $createdAt, $updatedAt, $id_category);
        $this->brand=$brand;
        $this->warranty_fee=$warranty_fee;
    }
    
    public function getBrand(){
        return $this->brand;
    }
    public function setBrand($brand){
        $this->brand=$brand;
        return $this;
    }

    public function getWarranty_fee(){
        return $this->warranty_fee;
    }
    public function setWarranty_fee($warranty_fee){
        $this->warranty_fee=$warranty_fee;
        return $this;
    }
        
    
    
}

?>
