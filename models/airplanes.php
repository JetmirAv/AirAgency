<?php

class Airplane
{

    private $id;
    private $name;
    private $yearOfProd;
    private $seats;
    private $fuelCapacity;
    private $maxSpeed;
    private $additionaDesc;
    private $img;
    private $createdAt;
    private $updatedAt;

    function __construct(
        $name,
        $yearOfProd,
        $seats,
        $fuelCapacity,
        $maxSpeed,
        $additionaDesc,
        $img = null
    ) {

        $this->name = $name;
        $this->yearOfProd = $$yearOfProd;
        $this->seats = $seats;
        $this->fuelCapacity = $fuelCapacity;
        $this->maxSpeed = $maxSpeed;
        $this->additionaDesc = $additionaDesc;
        $this->img = $img;
        $this->createdAt = (new DateTime())->format('Y-m-d H:i:s');
        $this->updatedAt = (new DateTime())->format('Y-m-d H:i:s');
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getYearOfProd()
    {
        return $this->yearOfProd;
    }

    public function setYearOfProd($yearOfProd)
    {
        $this->yearOfProd = $yearOfProd;
    }

    public function getSeats()
    {
        return $this->seats;
    }

    public function setSeats($seats)
    {
        $this->seats = $seats;
    }

    public function getFuelCapacity()
    {
        return $this->fuelCapacity;
    }

    public function setFuelCapacity($fuelCapacity)
    {
        $this->fuelCapacity = $fuelCapacity;
    }

    public function getMaxSpeed()
    {
        return $this->maxSpeed;
    }

    public function setMaxSpeed($maxSpeed)
    {
        $this->maxSpeed = $maxSpeed;
    }

    public function getAdditionaDesc()
    {
        return $this->additionaDesc;
    }

    public function setAdditionaDesc($additionaDesc)
    {
        $this->additionaDesc = $additionaDesc;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function create($conn)
    {
        $query = "insert into airplane ".
            " (name, yearOfProd, seats, fuelCapacity, maxspeed, additionalDesc,img) ".
            " values (:name, :yearOfProd, :seats, :fuelCapacity, :maxspeed, :additionalDesc, :img)";
        
        $paramArray = [
            ":name" => $this->name,
            ":yearOdProd" => $this->yearOfProd,
            ":seats" => $this->seats,
            ":fuelCapacity" => $this->fuelCapacity,
            ":maxspeed" => $this->maxSpeed,
            ":additionalDesc" => $this->additionaDesc,
            ":img" => $this->img
        ];    

        $stm = $conn->prepare($query);
        return $stm->execute($paramArray);      
     }
}
