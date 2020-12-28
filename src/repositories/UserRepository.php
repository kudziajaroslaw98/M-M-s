<?php

class UserRepository
{
    private $connect = null;

    public function __construct()
    {
        try {
            global $config;
            $this->connect = new PDO($config['dsn'], $config['username'], $config['password']);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function select()
    {
        try {
            $sql = "SELECT * FROM users";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute();

            $users = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $user = new User();

                $user->setUserID($row['userID'])->setFirstName($row['firstName'])->setLastName($row['lastName'])->setJobtitle($row['jobtitle'])->setPhoneNumber($row['phoneNumber']);
                array_push($users, $user);
            }

            return $users;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findById(int $id)
    {
        try {
            $sql = "SELECT * FROM users WHERE userID=:id";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => Validation::sanitizeInt($id)
            ));

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                return null;
            }

            $user = new User();
            $user->setUserID($row['userID'])->setFirstName($row['firstName'])->setLastName($row['lastName'])->setJobtitle($row['jobtitile'])->setPhoneNumber($row['phoneNumber']);

            return $user;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert(User $user)
    {
    }

    public function update(User $user, int $id)
    {
    }
}
