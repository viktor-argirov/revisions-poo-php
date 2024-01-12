<?php
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