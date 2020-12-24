<?php

class HardwareController
{
    public static function renderViewAdd()
    {
        echo HardwareViewAdd::render(array(
            'title' => 'Add Hardware',
            'subtitle' => 'Add Hardware'
        ));
        return;
    }

    public static function renderViewShow()
    {
        echo HardwareViewShow::render(array(
            'title' => 'Show Hardware',
            'subtitle' => 'Found Hardware'
        ));
    }

    public static function renderViewSearch()
    {
        echo HardwareViewSearch::render(array(
            'title' => 'Search Hardware',
            'subtitle' => 'Search Hardware'
        ));
    }
}
