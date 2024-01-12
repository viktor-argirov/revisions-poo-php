
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


    public static function findOneById(int $id) {
        $servername = "localhost";
        $username = "root";
        $password = "123456789";
        $dbname = "draft-shop";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            throw new Exception("La connexion a échoué : " . $conn->connect_error);
        }

        $sql = "SELECT * FROM product WHERE id = " . $id;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $product = new Product(
                $row['id'],
                $row['name'],
                $row['photos'],
                $row['price'],
                $row['description'],
                $row['quantity'],
                $row['createdAt'],
                $row['updatedAt'],
                $row['id_category']
            );

            $conn->close();

            return $product;
        } else {
            $conn->close();
            return false;
        }
    }
}

$product = Product::findOneById(7);

if ($product !== false) {

} else {

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
?>
