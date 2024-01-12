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
?>