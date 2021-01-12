<?php

class LoginController
{
    public static function render()
    {
        echo LoginView::render(array(
            'title' => 'Login'
        ));
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

    public static function check()
    {
        if (!isset($_SESSION['uid'])) {
            return false;
        }

        return true;
    }
}
