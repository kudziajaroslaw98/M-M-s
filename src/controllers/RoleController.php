<?php

class RoleController
{
    public static function renderViewShow()
    {
        echo RoleViewShow::render(array(
            'title' => 'Show Roles',
            'subtitle' => 'Show Roles'
        ));
    }
}
