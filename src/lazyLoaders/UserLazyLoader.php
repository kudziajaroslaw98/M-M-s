<?php

class UserLazyLoader
{
    private static array $instances = array();

    public static function getUser(int $id)
    {
        if (!isset(self::$instances[$id])) {
            $userRepository = new UserRepository();
            $user = $userRepository->findById($id);

            self::$instances[$id] = $user;
        }

        return self::$instances[$id];
    }

    public static function setUser(User &$user)
    {
        if (!isset(self::$instances[$user->getUserID()])) {
            self::$instances[$user->getUserID()] = $user;
        }
    }
}
