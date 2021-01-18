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
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
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
                $user->setUserID($row['userID'])->setFirstName($row['firstName'])->setLastName($row['lastName'])->setJobtitle($row['jobtitle'])->setPhoneNumber($row['phoneNumber'])->setLogin($row['login'])->setPassword($row['password']);

                $rolesUsersRepository = new RolesUsersRepository();
                $rolesID = $rolesUsersRepository->findRolesByUserId($user->getUserID());

                $rolesUsersRepository = new RolesUsersRepository();
                $rolesUsers_array = $rolesUsersRepository->findRolesByUserId($user->getUserID());

                $roleRepository = new RoleRepository();
                $rolesNamesToUser = array();
                foreach ($rolesUsers_array as $roleUsers) {
                    $role = $roleRepository->findById($roleUsers->getRoleID());
                    array_push($rolesNamesToUser, $role->getRoleName());
                }

                $user->setRoleNames($rolesNamesToUser);

                array_push($users, $user);
            }

            return $users;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
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
            $user->setUserID($row['userID'])->setFirstName($row['firstName'])->setLastName($row['lastName'])->setJobtitle($row['jobtitle'])->setPhoneNumber($row['phoneNumber'])->setLogin($row['login'])->setPassword($row['password']);

            $rolesUsersRepository = new RolesUsersRepository();
            $rolesUsers_array = $rolesUsersRepository->findRolesByUserId($user->getUserID());

            $roleRepository = new RoleRepository();
            $rolesNamesToUser = array();
            foreach ($rolesUsers_array as $roleUsers) {
                $role = $roleRepository->findById($roleUsers->getRoleID());
                array_push($rolesNamesToUser, $role->getRoleName());
            }

            $user->setRoleNames($rolesNamesToUser);

            return $user;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public function findByLogin(string $login)
    {
        try {
            $sql = "SELECT * FROM users WHERE login=:login";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'login' => Validation::sanitizeText($login)
            ));

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                return null;
            }

            $user = new User();
            $user->setUserID($row['userID'])->setFirstName($row['firstName'])->setLastName($row['lastName'])->setJobtitle($row['jobtitle'])->setPhoneNumber($row['phoneNumber'])->setLogin($row['login'])->setPassword($row['password']);

            $rolesUsersRepository = new RolesUsersRepository();
            $rolesUsers_array = $rolesUsersRepository->findRolesByUserId($user->getUserID());

            $roleRepository = new RoleRepository();
            $rolesNamesToUser = array();
            foreach ($rolesUsers_array as $roleUsers) {
                $role = $roleRepository->findById($roleUsers->getRoleID());
                array_push($rolesNamesToUser, $role->getRoleName());
            }

            $user->setRoleNames($rolesNamesToUser);

            return $user;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public function insert(User $user)
    {
        try {
            $sql = "INSERT INTO users VALUES (:userID, :firstName, :lastName, :jobtitle, :phoneNumber, :login, :password)";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'userID' => $user->getUserID(),
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'jobtitle' => $user->getJobtitle(),
                'phoneNumber' => $user->getPhoneNumber(),
                'login' => $user->getLogin(),
                'password' => $user->getPassword()
            ));

            return $result;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public function update(User $user)
    {
        try {
            $sql = "UPDATE users SET firstName=:firstName, lastName=:lastName, jobtitle=:jobtitle, phoneNumber=:phoneNumber, login=:login, password=:password WHERE userID=:id";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => $user->getUserID(),
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'jobtitle' => $user->getJobtitle(),
                'phoneNumber' => $user->getPhoneNumber(),
                'login' => $user->getLogin(),
                'password' => $user->getPassword()
            ));

            return $result;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }
}
