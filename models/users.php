<?php

require('dbConnection.php');

class User
{
    private $id;
    private $roleId;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $birthday;
    private $gender;
    private $address;
    private $city;
    private $state;
    private $postal;
    private $phoneNumber;
    private $img;
    private $createdAt;
    private $updatedAt;
    private $conn;

    function __construct(
        $roleId,
        $firstname,
        $lastname,
        $email,
        $password,
        $birthday,
        $gender,
        $address,
        $city,
        $state,
        $postal,
        $phoneNumber,
        $img
    ) {
        $this->roleId = $roleId;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->birthday = $birthday;
        $this->gender = $gender;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->postal = $postal;
        $this->phoneNumber = $phoneNumber;
        $this->img = $img;
        $this->createdAt = (new DateTime())->format('Y-m-d H:i:s');
        $this->updatedAt = (new DateTime())->format('Y-m-d H:i:s');
    }

    function __destruct()
    {
        echo "Object destroyed";
    }

    function getId()
    {
        return $this->id;
    }
    function getRoleId()
    {
        return $this->roleId;
    }
    function getFirestName()
    {
        return $this->firstname;
    }
    function getLastName()
    {
        return $this->lastname;
    }
    function getEmail()
    {
        return $this->email;
    }
    function getPassword()
    {
        return $this->password;
    }
    function getBirthday()
    {
        return $this->birthday;
    }
    function getGender()
    {
        return $this->gender;
    }
    function getAddress()
    {
        return $this->address;
    }
    function getCity()
    {
        return $this->city;
    }
    function getState()
    {
        return $this->state;
    }
    function getPostal()
    {
        return $this->postal;
    }
    function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    function getImg()
    {
        return $this->img;
    }
    function getCreatedAt()
    {
        return $this->createdAt;
    }
    function getUpdatedAt()
    {
        return $this->updatedAt;
    }


    function setRoleId($roleId)
    {
        $this->roleId = $roleId;
    }
    function setFirstName($firstname)
    {
        $this->firstname = $firstname;
    }
    function setLastName($lastname)
    {
        $this->lastname = $lastname;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }
    function setPassword($password)
    {
        $this->password = $password;
    }
    function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }
    function setGender($gender)
    {
        $this->gender = $gender;
    }
    function setAddress($address)
    {
        $this->address = $address;
    }
    function setCity($city)
    {
        $this->city = $city;
    }
    function setState($state)
    {
        $this->state = $state;
    }
    function setPostal($postal)
    {
        $this->postal = $postal;
    }
    function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
    function setImg($img)
    {
        $this->img = $img;
    }
    function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
    function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    static function findAll($conn, $limit)
    {
        $getAllUsers = "select id, concat('../uploads/user-img/',img) as img ,".
        " concat(firstname ,'  ', lastname) as fullname, " .
        "gendre, email, birthday, state, city, phoneNumber from users order by id asc  limit " . $limit;
        $stm = $conn->prepare($getAllUsers);
        $stm->execute();
        return $stm->fetchAll();
    }

    static function findById($conn, $id)
    {
        $getUserById = "
        select 
            u.id, 
            u.firstname, 
            u.lastname, 
            u.email, 
            u.gendre, 
            u.birthday, 
            u.address, 
            u.city, 
            u.state, 
            u.postal, 
            u.phoneNumber, 
            u.img,
            c.number, 
            concat(c.expMonth, '/', c.expYear) as 'c.exp', 
            c.code
                from users u left join card c on u.id = c.userID where u.id = " . $id;
        $stm = $conn->prepare($getUserById);
        $stm->execute();
        return $stm->fetch();
    }

    function createUser($conn)
    {
        $query = 'insert into users (roleId, firstname,' .
            ' lastname, email, password, birthday, gendre, ' .
            'address, city, state, postal, phoneNumber, img, ' .
            'createdAt, updatedAt) values ( ?,?,?,?,?,?,?,?,?,?,?,?,?,?, ? )';

        $paramArray = [
            $this->roleId,
            $this->firstname,
            $this->lastname,
            $this->email,
            $this->password,
            $this->birthday,
            $this->gender,
            $this->address,
            $this->city,
            $this->state,
            $this->postal,
            $this->phoneNumber,
            $this->img,
            (string)$this->createdAt,
            (string)$this->updatedAt,
        ];
        $stm = $conn->prepare($query);
        try {
            $stm->execute($paramArray);
        } catch (PDOException $ex) {
            throw new Exception($ex);
        }
    }
    static function count($conn){
        $count = "select count(*) as count from users where roleId=2";
        $stm = $conn->prepare($count);
        $stm->execute();
        return $stm->fetch();
    }
}
