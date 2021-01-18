<?php

class UserController
{
    public static function renderViewAdd()
    {
        echo UserViewAdd::render(array(
            'title' => 'Add user',
            'subtitle' => 'Add user'
        ));
    }

    public static function renderViewShow()
    {
        echo UserViewShow::render(array(
            'title' => 'Show users',
            'subtitle' => 'Show users'
        ));
    }
}
