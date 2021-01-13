<?php

class LoginController
{
    public static function render()
    {
        echo LoginView::render(array(
            'title' => 'Login'
        ));
    }

    public static function redirectioning()
    {
        if (self::isLogged()) {
            header('Location: index.php?action=hardware-show');
        } else {
            self::render();
        }
    }

    public static function set()
    {
        $_SESSION['uid'] = 42;
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
    }

    public static function isLogged()
    {
        if (!isset($_SESSION['uid'])) {
            return false;
        }

        return true;
    }
}
