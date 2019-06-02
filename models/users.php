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

    function __construct(
        $roleId,
        $firstname,
        $lastname,
        $email,
        $birthday,
        $gender,
        $address,
        $city,
        $state,
        $postal,
        $phoneNumber,
        $password = null,
        $img = null
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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getRoleId()
    {
        return $this->roleId;
    }

    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getPostal()
    {
        return $this->postal;
    }

    public function setPostal($postal)
    {
        $this->postal = $postal;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
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

    public static function findAll($conn, $limit, $offset)
    {
        $getAllUsers = "select id, concat('../uploads/user-img/',img) as img ," .
            " concat(firstname ,'  ', lastname) as fullname, " .
            "gendre, email, birthday, state, city, phoneNumber from users order by id asc limit ? offset ?";
        $stm = $conn->prepare($getAllUsers);
        $stm->bindParam(1, $limit, PDO::PARAM_INT);
        $stm->bindParam(2, $offset, PDO::PARAM_INT);
        $stm->execute();


        return $stm->fetchAll();
    }

    static function findById($conn, $id, $admin = null)
    {
        $extra = "";
        if ($admin !== null) {
            $extra = "u.createdAt as 'createdAt', u.updatedAt as 'updatedAt', ";
        }

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
            u.img," .
            $extra .
            "c.number, 
            concat(c.expMonth, '/', c.expYear) as 'c.exp', 
            c.code,
            u.roleId
                from users u left join card c on u.id = c.userID where u.id = ?";
        $stm = $conn->prepare($getUserById);
        $stm->bindParam(1, $id, PDO::PARAM_INT);
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
            return $stm->execute($paramArray);
        } catch (PDOException $ex) {
            throw new Exception($ex);
        }
    }
    static function count($conn, $filter = null)
    {
        if ($filter === null) {
            $count = "select count(*) as count from users where roleId=2";
        } else {
            $count = "select count(*) as count from users where roleId=2 " .
                "AND MONTH(createdAt) = MONTH(CURRENT_DATE) " .
                " AND YEAR(createdAt) = YEAR(CURRENT_DATE);";
        }
        $stm = $conn->prepare($count);
        $stm->execute();
        return $stm->fetch();
    }
    static function findByEmailAndPassword($conn, $email, $password)
    {
        $findByEmailQuery = "select * from users where email = ?";
        $findByEmail = $conn->prepare($findByEmailQuery);
        $findByEmail->execute([$email]);

        if ($findByEmail->rowCount() > 0) {
            $user = $findByEmail->fetchAll()[0];
            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                throw new Exception("Incorrect password");
            }
        } else {
            throw new Exception("No user with this email is registered in our site");
        }
    }
    public static function delete($conn, $id)
    {
        $user = self::findById($conn, $id);
        print_r($user);
        if ($user['roleId'] != 1) {
            $query = "delete from users where id = ?";
            $stm = $conn->prepare($query);
            $stm->bindParam(1, $id, PDO::PARAM_INT);
            try {
                return $stm->execute();
            } catch (Exception $ex) {
                throw new Exception("We faced some problems with this process");
            }
        } else {
            throw new Exception("Can't delete an Admin");
        }
    }
    public function update($conn, $userId)
    {
        $query = "update users set 
        firstname = :firstname, 
        lastname = :lastname, 
        email = :email, " . ($this->password === null ? "" : 'password =  :password,') .
            " birthday = :birthday, 
        gendre = :gendre, 
        address=:address ,
        city=:city , 
        state=:state , 
        postal=:postal , 
        phoneNumber=:phoneNumber, " . ($this->img === null ? '' : 'img=:img, ') .
            "updatedAt = NOW() where id = :userId";

        $paramArray = [
            ':firstname' => $this->firstname,
            ':lastname' => $this->lastname,
            ':email' => $this->email,
            ':birthday' => $this->birthday,
            ':gendre' => $this->gender,
            ':address' => $this->address,
            ':city' => $this->city,
            ':state' => $this->state,
            ':postal' => $this->postal,
            ':phoneNumber' => $this->phoneNumber,
            ':userId' => $userId
        ];
        echo "<br>";
        echo "<br>";
        echo $query;
        ($this->password === null ? null : $paramArray[":password"] =  $this->password);
        echo "<br>";
        echo "<br>";
        ($this->img === null ? null : $paramArray[":img"] = $this->img);

        print_r($paramArray);
        echo "<br>";
        echo "<br>";

        echo gettype($this->password);
        echo "<br>";
        echo gettype($this->img);
        $stm = $conn->prepare($query);
        try {
            return $stm->execute($paramArray);
        } catch (PDOException $ex) {
            throw new Exception($ex);
        }
    }
}
