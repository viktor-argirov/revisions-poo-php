<?php

class Product {
    private ?int $id;
    private ?string $name;
    private ?string $photos;
    private ?int $price;
    private ?string $description;
    private ?int $quantity;
    private ?DateTime $createdAt;
    private ?DateTime $updatedAt;


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


$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "draft-shop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

$product = new Product(null, null, null, null, null, null, null, null);

$sql = "SELECT * FROM product WHERE id = 7";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    $row = $result->fetch_assoc();
 
    $product->setId($row['id'])
        ->setName($row['name'])
        ->setPhotos($row['photos'])
        ->setPrice($row['price'])
        ->setDescription($row['description'])
        ->setQuantity($row['quantity'])
        ->setCreatedAt(new DateTime($row['createdAt']))
        ->setUpdatedAt(new DateTime($row['updatedAt']));

    $conn->close();
     
} else {
    echo "Aucun résultat trouvé pour l'ID 7";
}

?>