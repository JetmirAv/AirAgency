<?php


class Booked
{
    private $id;
    private $flightId;
    private $userId;
    private $price;
    private $quantity;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        $flightId,
        $userId,
        $price,
        $quantity
    ) {
        $this->flightId = $flightId;
        $this->userId = $userId;
        $this->price = $price;
        $this->quantity = $quantity;
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

    public function getFlightId()
    {
        return $this->flightId;
    }

    public function setFlightId($flightId)
    {
        $this->flightId = $flightId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public static function findAll($conn, $limit, $offset)
    {
        $query = "select id,flightId,userId,price,quantity,createdAt,updatedAt from booked  limit ? offset ?";
        $stm = $conn->prepare($query);
        $stm->bindParam(1, $limit, PDO::PARAM_INT);
        $stm->bindParam(2, $offset, PDO::PARAM_INT);
        try {
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $ex) {
            throw new Exception($ex);
        }
    }

    public static function getProfitThroughYear($conn)
    {
        $query = "SELECT MONTH(createdAt) as 'month', SUM(price) as 'total' FROM booked" .
            " WHERE YEAR(createdAt) = YEAR(CURRENT_DATE)" .
            " GROUP BY MONTH(createdAt);";
        $stm = $conn->prepare($query);
        $stm->execute();
        return $stm->fetchAll();
    }

    public static function delete($conn, $id)
    {
        $query = "delete from booked where id = ?";
        $stm = $conn->prepare($query);
        $stm->bindParam(1, $id, PDO::PARAM_INT);
        try {
            return $stm->execute();
        } catch (Exception $ex) {
            throw new Exception("We faced some errors with this operation");
        }
    }

    public static function notifications($conn, $limit, $offset)
    {
        $query = "SELECT b.id, CONCAT(u.firstname, ' ', u.lastname) as fullname, c1.name as 'from', c2.name as 'to'," .
            "a.name as 'plane' FROM booked b " .
            "inner join users u on u.id=b.userId " .
            "inner join flight f on b.flightId=f.id " .
            "inner join city c1 on f.fromCity = c1.id " .
            "inner join city c2 on f.toCity = c2.id " .
            "inner join airplane a on f.planeId = a.id " .
            "order by b.createdAt DESC limit ? offset ?";
        $stm = $conn->prepare($query);
        $stm->bindParam(1, $limit, PDO::PARAM_INT);
        $stm->bindParam(2, $offset, PDO::PARAM_INT);
        try {
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
