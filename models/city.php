<?php

class City
 {

    private $id;
    private $name;  
    private $img;
    private $createdAt;
    private $updatedAt;

    function __construct(
        $name,
        $img 
    ) 
    {

        $this->name = $name;
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



}
