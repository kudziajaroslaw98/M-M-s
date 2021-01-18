<?php

class RolesUsersRepository
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
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public function select()
    {
        try {
            $sql = "SELECT * FROM roles_users";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute();

            $roles_users_array = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $roles_users = new RolesUsers();

                $roles_users->setUserID($row['userID'])->setRoleID($row['roleID']);
                array_push($roles_users_array, $roles_users);
            }

            return $roles_users_array;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public function findRolesByUserId(int $id)
    {
        try {
            $sql = "SELECT * FROM roles_users WHERE userID=:id";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => Validation::sanitizeInt($id)
            ));

            $roles_users_array = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $roles_users = new RolesUsers();

                $roles_users->setUserID($row['userID'])->setRoleID($row['roleID']);
                array_push($roles_users_array, $roles_users);
            }

            return $roles_users_array;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public function findUsersByRoleId(int $id)
    {
        try {
            $sql = "SELECT * FROM roles_users WHERE roleID=:id";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => Validation::sanitizeInt($id)
            ));

            $roles_users_array = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $roles_users = new RolesUsers();

                $roles_users->setUserID($row['userID'])->setRoleID($row['roleID']);
                array_push($roles_users_array, $roles_users);
            }

            return $roles_users_array;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public function insert(RolesUsers $roles_users)
    {
        try {
            $sql = "INSERT INTO roles_users VALUES (:userID, :roleID)";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'userID' => $roles_users->getUserID(),
                'roleID' => $roles_users->getRoleID()
            ));

            return $result;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public function updateByUserId(RolesUsers $roles_users)
    {
        try {
            $sql = "UPDATE roles_users SET roleID=:roleID WHERE userID=:userID";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'roleID' => $roles_users->getRoleID(),
                'userID' => $roles_users->getUserID()
            ));

            return $result;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public function updateByRoleId(RolesUsers $roles_users)
    {
        try {
            $sql = "UPDATE roles_users SET userID=:userID WHERE roleID=:roleID";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'roleID' => $roles_users->getRoleID(),
                'userID' => $roles_users->getUserID()
            ));

            return $result;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }
}
