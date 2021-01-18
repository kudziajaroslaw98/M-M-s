<?php

class RoleRepository
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
            $sql = "SELECT * FROM roles";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute();

            $roles = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $role = new Role();

                $role->setRoleID($row['roleID'])->setRoleName($row['roleName']);
                array_push($roles, $role);
            }
            return $roles;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public function findById($id)
    {
        if (!ctype_digit(strval($id))) {
            throw new InvalidInputExcetion('Given data are invalid!');
        }
        try {
            $sql = "SELECT * FROM roles WHERE roleID=:id";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => Validation::sanitizeInt($id)
            ));

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                return null;
            }

            $role = new Role();
            $role->setRoleID($row['roleID'])->setRoleName($row['roleName']);

            return $role;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public function searchById(int $id)
    {
        try {
            $sql = "SELECT * FROM roles WHERE roleID LIKE :id";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => Validation::sanitizeInt($id) . '%'
            ));

            $roles = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $role = new Role();
                $role->setRoleID($row['id'])->setRoleName($row['roleName']);
                array_push($roles, $role);
            }

            return $roles;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public function insert(Role $role)
    {
        try {
            $sql = "INSERT INTO roles VALUES (:roleID, roleName)";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'roleID' => $role->getRoleID(),
                'roleName' => $role->getRoleName()
            ));

            return $result;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public function update(Role $role)
    {
        try {
            $sql = "UPDATE roles SET roleName=:roleName WHERE roleID=:id";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => $role->getRoleID(),
                'roleName' => $role->getRoleName()
            ));

            return $result;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }
}
