<?php


class Flight
{

    private $id;
    private $fromCity;
    private $toCity;
    private $avalible;
    private $price;
    private $isSale;
    private $checkIn;
    private $img;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        $fromCity,
        $toCity,
        $avalible,
        $price,
        $isSale,
        $checkIn,
        $img
    ) {
        $this->fromCity = $fromCity;
        $this->toCity = $toCity;
        $this->avalible = $avalible;
        $this->price = $price;
        $this->isSale = $isSale;
        $this->checkIn = $checkIn;
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

    public function getFromCity()
    {
        return $this->fromCity;
    }

    public function setFromCity($fromCity)
    {
        $this->fromCity = $fromCity;
    }

    public function getToCity()
    {
        return $this->toCity;
    }

    public function setToCity($toCity)
    {
        $this->toCity = $toCity;
    }

    public function getAvalible()
    {
        return $this->avalible;
    }

    public function setAvalible($avalible)
    {
        $this->avalible = $avalible;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getIsSale()
    {
        return $this->isSale;
    }

    public function setIsSale($isSale)
    {
        $this->isSale = $isSale;
    }

    public function getCheckIn()
    {
        return $this->checkIn;
    }

    public function setCheckIn($checkIn)
    {
        $this->checkIn = $checkIn;
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



    public static function getFlightsForYear($conn, $year = 0)
    {
        $query = "SELECT MONTH(checkIn) as 'month', COUNT(*) as 'num' FROM flight" .
            " WHERE YEAR(createdAt) = YEAR(CURRENT_DATE) - " . (int)$year .
            " GROUP BY MONTH(checkIn);";
        $stm = $conn->prepare($query);
        $stm->execute();
        return $stm->fetchAll();
    }

    public static function count($conn)
    {
        $query = "select count(*) as count from flight";
        $stm = $conn->prepare($query);
        $stm->execute();
        return $stm->fetch();
    }

    public static function findAll($conn, $offset = 0)
    {
        $query = "select id ,concat('../uploads/flight-img/',img)as image," .
            " fromCity,toCity,planeId,price,isSale,checkIn,createdAt, " .
            "updatedAt from flight limit 10 offset " . $offset;
        $stm = $conn->prepare($query);
        $stm->execute();
        return $stm->fetchAll();
    }
    public static function findById($conn, $id)
    {
        $query = "SELECT c1.id as 'fromCityId',
        a.id as 'airplaneId',
        a.name as 'AirplaneName',
        f.planeId as 'planeId',
        f.toCity as 'toCity',
        f.fromCity as 'fromCity',
        c2.id as 'toCityId',
        c1.name as 'From City',
        c2.name as 'To City',
        f.avalible as 'Available',
        a.name as 'Airplane',
        f.checkIn as  'CheckIn',
        f.price as 'Price',
        f.isSale as 'isSale',
        f.createdAt as 'created At',
        f.updatedAt as 'update At',
        f.img as 'img'
        FROM flight f INNER JOIN city c1 
        ON f.fromCity = c1.id
        INNER JOIN city c2 
        ON f.toCity=c2.id
        INNER JOIN Airplane a 
        ON f.planeId=a.id
        WHERE f.id= ?";

        $stm = $conn->prepare($query);
        $stm->execute([$id]);
        return $stm->fetch();
    }

    public static function delete($conn, $id)
    {
        $query = "delete from flight where id = ?";
        $stm = $conn->prepare($query);
        $stm->bindParam(1, $id, PDO::PARAM_INT);
        try {
            return $stm->execute();
        } catch (Exception $ex) {
            throw new Exception("We faced some problems with this process");
        }
    }
}
