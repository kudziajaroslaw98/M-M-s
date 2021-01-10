<?php

class LicenseController
{
    public static function renderViewAdd()
    {
        echo LicenseViewAdd::render(array(
            'title' => 'Add License',
            'subtitle' => 'Add License'
        ));
    }

    public static function renderViewShow()
    {
        echo LicenseViewShow::render(array(
            'title' => 'Show License',
            'subtitle' => 'Your licenses'
        ));
    }
}
