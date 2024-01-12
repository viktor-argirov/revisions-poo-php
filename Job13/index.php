<?php

abstract class AbstractProduct {
    private $id;
    private $name;
    private $photos;
    private $price;
    private $description;
    private $quantity;
    private $createdAt;
    private $updatedAt;
    private $id_category;

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

    public function getIdCategory() {
        return $this->id_category;
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

    public function setIdCategory($id_category) {
        $this->id_category = $id_category;
        return $this;
    }

    abstract public static function findOneById($id);

    abstract public static function findAll();

    abstract public function create();

    abstract public function update();

    protected function executeQuery($sql, $params = array()) {
        $servername = "localhost";
        $username = "root";
        $password = "123456789";
        $dbname = "draft-shop";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            throw new Exception("La connexion a échoué : " . $conn->connect_error);
        }

        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            throw new Exception("Erreur de préparation de la requête : " . $conn->error);
        }

        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();

        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();

        return $result;
    }
}

class Clothing extends AbstractProduct {
    private $size;
    private $color;
    private $type;
    private $material_fee;

    public function __construct($id, $name, $photos, $price, $description, $quantity, $createdAt, $updatedAt, $id_category, $size, $color, $type, $material_fee) {
        parent::__construct($id, $name, $photos, $price, $description, $quantity, $createdAt, $updatedAt, $id_category);
        $this->size = $size;
        $this->color = $color;
        $this->type = $type;
        $this->material_fee = $material_fee;
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

    public static function findOneById($id) {
        $sql = "SELECT * FROM product WHERE id = ?";
        $params = array($id);
        $result = self::executeQuery($sql, $params);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            return new Clothing(
                $row['id'],
                $row['name'],
                $row['photos'],
                $row['price'],
                $row['description'],
                $row['quantity'],
                $row['createdAt'],
                $row['updatedAt'],
                $row['id_category'],
                $row['size'],
                $row['color'],
                $row['type'],
                $row['material_fee']
            );
        } else {
            return false;
        }
    }

    public static function findAll() {
        $sql = "SELECT * FROM product";
        $result = self::executeQuery($sql);

        $products = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = new Clothing(
                    $row['id'],
                    $row['name'],
                    $row['photos'],
                    $row['price'],
                    $row['description'],
                    $row['quantity'],
                    $row['createdAt'],
                    $row['updatedAt'],
                    $row['id_category'],
                    $row['size'],
                    $row['color'],
                    $row['type'],
                    $row['material_fee']
                );

                $products[] = $product;
            }
        }

        return $products;
    }

    public function create() {
        $servername = "localhost";
        $username = "root";
        $password = "123456789";
        $dbname = "draft-shop";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            throw new Exception("La connexion a échoué : " . $conn->connect_error);
        }

        $sql = "INSERT INTO product (name, photos, price, description, quantity, createdAt, updatedAt, id_category)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $result = $conn->query($sql);

        $products = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = new Product(
                    $row['id'],
                    $row['name'],
                    $row['photos'],
                    $row['price'],
                    $row['description'],
                    $row['quantity'],
                    $row['createdAt'],
                    $row['updatedAt'],
                    $row['id_category'],
                    $row['size'],
                    $row['color'],
                    $row['type'],
                    $row['material_fee']
                );

                $products[] = $product;
            }
        }

        $conn->close();

        return $products;
    }
    public function update() {
        $servername = "localhost";
        $username = "root";
        $password = "123456789";
        $dbname = "draft-shop";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            throw new Exception("La connexion a échoué : " . $conn->connect_error);
        }

        $sql = "UPDATE product
                SET name=?, photos=?, price=?, description=?, quantity=?, updatedAt=?, id_category=?
                WHERE id=?";

        $result = $conn->query($sql);

        $products = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = new Product(
                    $row['id'],
                    $row['name'],
                    $row['photos'],
                    $row['price'],
                    $row['description'],
                    $row['quantity'],
                    $row['createdAt'],
                    $row['updatedAt'],
                    $row['id_category'],
                    $row['size'],
                    $row['color'],
                    $row['type'],
                    $row['material_fee']
                );

                $products[] = $product;
            }
        }

        $conn->close();

        return $products;
        }
}


class Electronic extends AbstractProduct {
    private $brand;
    private $warranty_fee;

    public function __construct($id, $name, $photos, $price, $description, $quantity, $createdAt, $updatedAt, $id_category, $brand, $warranty_fee) {
        parent::__construct($id, $name, $photos, $price, $description, $quantity, $createdAt, $updatedAt, $id_category);
        $this->brand = $brand;
        $this->warranty_fee = $warranty_fee;
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

    public static function findOneById($id) {
        $sql = "SELECT * FROM product WHERE id = ?";
        $params = array($id);
        $result = self::executeQuery($sql, $params);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            return new Electronic(
                $row['id'],
                $row['name'],
                $row['photos'],
                $row['price'],
                $row['description'],
                $row['quantity'],
                $row['createdAt'],
                $row['updatedAt'],
                $row['id_category'],
                $row['brand'],
                $row['warranty_fee']
            );
        } else {
            return false;
        }
    }

    public static function findAll() {
        $sql = "SELECT * FROM product";
        $result = self::executeQuery($sql);

        $products = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = new Electronic(
                    $row['id'],
                    $row['name'],
                    $row['photos'],
                    $row['price'],
                    $row['description'],
                    $row['quantity'],
                    $row['createdAt'],
                    $row['updatedAt'],
                    $row['id_category'],
                    $row['brand'],
                    $row['warranty_fee']
                );

                $products[] = $product;
            }
        }

        return $products;
    }

    public function create() {
        $servername = "localhost";
        $username = "root";
        $password = "123456789";
        $dbname = "draft-shop";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            throw new Exception("La connexion a échoué : " . $conn->connect_error);
        }

        $sql = "INSERT INTO product (name, photos, price, description, quantity, createdAt, updatedAt, id_category)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $result = $conn->query($sql);

        $products = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
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

                $products[] = $product;
            }
        }

        $conn->close();

        return $products;
    }
    public function update() {
        $servername = "localhost";
        $username = "root";
        $password = "123456789";
        $dbname = "draft-shop";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            throw new Exception("La connexion a échoué : " . $conn->connect_error);
        }

        $sql = "UPDATE product
                SET name=?, photos=?, price=?, description=?, quantity=?, updatedAt=?, id_category=?
                WHERE id=?";

        $result = $conn->query($sql);

        $products = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
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

                $products[] = $product;
            }
        }

        $conn->close();

        return $products;
        }
}

?>
